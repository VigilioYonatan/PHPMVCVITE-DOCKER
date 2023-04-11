import { JSX } from "preact/jsx-runtime";
import { useMemo, useState } from "preact/hooks";
import { JSXInternal } from "preact/src/jsx";

export type TableHeads<T> = {
    head: keyof T;
    title: string;
    customHead?: (head: {
        title: TableHeads<T>["title"];
        head: TableHeads<T>["head"];
        isSort: TableHeads<T>["isSort"];
        onSort: (
            head: TableHeads<T>["head"],
            isSort: TableHeads<T>["isSort"]
        ) => void;
        isSortActive: (
            sort: string | boolean | undefined,
            head: keyof T
        ) => keyof Sorting;
    }) => JSX.Element | JSX.Element[];

    width?: number;
    isSort?: boolean | string;
};
export type TableBody<T> = {
    cell: TableHeads<T>["head"];
    customCell?: (info: { body: T; index: number | string }) => string | number;
    row?: (info: {
        body: T;
        index: number;
    }) => JSX.Element | JSX.Element[] | string | number;
};

// type as = Record<bol, string>;
export type PaginationTable = {
    offset: number;
    limit: number;
    page: number;
};
type PaginatorState<T> = {
    table: T[];
    loading?: boolean;
    count: number;
};
type Sorting = {
    [sort: string]: number;
};

type SortStateReturn<T> = {
    changeSort: (
        head: TableHeads<T>["head"],
        isSort: TableHeads<T>["isSort"]
    ) => void;
    sorting: Sorting;
    isSortActive(
        sort: TableHeads<T>["isSort"],
        head: TableHeads<T>["head"]
    ): keyof Sorting;
};

export type customTabStyleProps = {
    index: number;
    StylePagged?: string;
    styleNoPagged?: string;
};
export type UseTableProps<T> = {
    tableHead: TableHeads<T>[];

    tableBodyRows: TableBody<T>[];
    config: Partial<PaginationTable>;
};
export type PaginatorTableMethods = {
    pagination: PaginationTable;
    pageCount: number;
    totalCountRows: number;
    totalCountForTables: number;
    pagesArray: number[];
    nextPage: () => void;
    nextFinalPage: () => void;
    backPage: () => void;
    backInitialPage: () => void;
    changePage: (index: number) => void;
    changePageInput: (e: JSXInternal.TargetedEvent<HTMLInputElement>) => void;
    isInitialPage: boolean;
    isFinalPage: boolean;
    changeLimit: (index: number) => void;
    customTabStyle: (custom: customTabStyleProps) => string;
    limitArray: (custom?: number[]) => number[];
};
export type TableReturn<T> = {
    tableHead: TableHeads<T>[];
    tableBody: PaginatorState<T>;
    tableBodyRows: TableBody<T>[];
    CustomHeadTable: (custom: {
        table: TableHeads<T>;
        children: JSX.Element[] | JSX.Element;
    }) => JSX.Element;
    CustomBodyTable: (body: {
        row: TableBody<T>;
        body: T;
        index: number;
        children: (rowReturn: string | number) => JSX.Element;
    }) => JSX.Element;
};
type UseTableReturn<T> = {
    table: TableReturn<T>;
    changeData: (data: Partial<PaginatorState<T>>) => void;
    paginator: PaginatorTableMethods;
    sort: SortStateReturn<T>;
};
export const useTable = <T extends object>({
    tableHead,
    tableBodyRows,
    config: { limit = 10, offset = 0, page = 0 },
}: UseTableProps<T>): UseTableReturn<T> => {
    const tableBody = useMemo(() => tableBodyRows, []);

    const [pagination, setpagination] = useState<PaginationTable>({
        offset,
        limit,
        page,
    });

    const [sorting, setSorting] = useState({} as Sorting);
    const [table, setData] = useState<PaginatorState<T>>({
        table: [],
        loading: true,
        count: 0,
    });
    const pageCount: number = Math.ceil(table.count / pagination.limit);
    const pagesArray: number[] = [...Array(pageCount || 0)];
    const isFinalPage = useMemo(
        () => pageCount === pagination.page + 1,
        [pageCount, pagination.page]
    );
    const isInitialPage = useMemo(
        () => pagination.page === 0,
        [pagination.page]
    );

    const CustomHeadTable = ({
        table,
        children,
    }: {
        table: TableHeads<T>;
        children: JSX.Element[] | JSX.Element;
    }) => (
        <>
            {table.customHead
                ? table.customHead({
                      title: table.title,
                      head: table.head,
                      onSort: () => changeSort(table.head, table.isSort),
                      isSort: table.isSort,
                      isSortActive,
                  })
                : children}
        </>
    );
    const CustomBodyTable = ({
        row,
        body,
        index,
        children,
    }: {
        row: TableBody<T>;
        body: T;
        index: number;
        children: (rowReturn: string | number) => JSX.Element;
    }) => {
        const indexCells: number =
            pagination.limit * pagination.page + index! + 1;
        const rowReturn = row.customCell
            ? row.customCell({
                  body,
                  index: indexCells,
              })
            : (body[row.cell] as string);

        return (
            <>
                {row.row ? (
                    <>
                        {row.row({
                            body,
                            index: indexCells,
                        })}
                    </>
                ) : (
                    children(rowReturn)
                )}
            </>
        );
    };

    const customTabStyle = ({
        index,
        StylePagged = "",
        styleNoPagged = "",
    }: customTabStyleProps) => {
        if (pagination.page === index) {
            return StylePagged;
        }
        return styleNoPagged;
    };

    const changeData = (datos: Partial<PaginatorState<T>>) => {
        setData((data) => ({ ...data, ...datos }));
    };
    /* Pages methods */
    const nextPage = () => {
        !isFinalPage &&
            setpagination((page) => ({
                ...page,
                offset: pagination.offset + pagination.limit,
                page: page.page + 1,
            }));
    };
    const nextFinalPage = () => {
        !isFinalPage &&
            setpagination((page) => ({
                ...page,
                offset: pagination.limit * (pageCount - 1),
                page: pageCount - 1,
            }));
    };
    const backPage = () => {
        if (isInitialPage) return;

        setpagination((page) => ({
            ...page,
            offset: pagination.offset - pagination.limit,
            page: page.page - 1,
        }));
    };
    const backInitialPage = () => {
        if (isFinalPage) return;

        setpagination((page) => ({
            ...page,
            offset: 0,
            page: 0,
        }));
    };

    const changePage = (index: number) => {
        if (index >= pageCount) return;
        setpagination((page) => ({
            ...page,
            offset: pagination.limit * index,
            page: index,
        }));
    };

    const changePageInput = ({
        currentTarget,
    }: JSXInternal.TargetedEvent<HTMLInputElement>) => {
        if (+currentTarget.value < 0) return;
        changePage(+currentTarget.value);
    };
    /* Limit Methods */

    const changeLimit = (index: number) => {
        // if (pagination.page === index) return;
        setpagination((page) => ({
            ...page,
            limit: index,
            offset: 0,
            page: 0,
        }));
    };

    const limitArray = (custom: number[] = [5, 10, 20, 30, 40, 50]) =>
        custom.filter((num) => num <= table.count && num);

    /* Sorts */

    const isSortActive = (
        sort: TableHeads<T>["isSort"],
        head: TableHeads<T>["head"]
    ): keyof Sorting =>
        sorting[typeof sort === "string" ? sort : (head as string)];

    const changeSort = (
        head: TableHeads<T>["head"],
        isSort: TableHeads<T>["isSort"]
    ) => {
        if (typeof isSort === "string") {
            setSorting((sort) => ({
                ...sort,
                [isSort]: sort[isSort] === 1 ? -1 : 1,
            }));
            return;
        }
        setSorting((sort) => ({
            ...sort,
            [head]: sort[head as string] === 1 ? -1 : 1,
        }));
    };

    return {
        table: {
            tableHead,
            tableBody: table,
            tableBodyRows,
            CustomHeadTable,
            CustomBodyTable,
        },
        changeData,
        paginator: {
            pagination,
            totalCountRows: table.count,
            totalCountForTables: table.table.length,
            pageCount,
            pagesArray,
            nextPage,
            nextFinalPage,
            backPage,
            backInitialPage,
            changePage,
            changePageInput,
            isInitialPage,
            isFinalPage,
            changeLimit,
            customTabStyle,
            limitArray,
        },
        sort: {
            changeSort,
            sorting,
            isSortActive,
        },
    };
};
