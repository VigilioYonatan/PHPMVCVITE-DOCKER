import { render } from "preact";
import { JSX } from "preact/jsx-runtime";
import { Provider } from "~/context/Provider";

export const CreateRoot = (
    id: string,
    children: JSX.Element | JSX.Element[]
) => {
    console.log(document.querySelector(id));

    if (document.querySelector(id)) {
        render(
            <Provider>{children}</Provider>,
            document.querySelector(id) as HTMLElement
        );
    }
};
