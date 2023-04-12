import { render } from "preact";
import { JSX } from "preact/jsx-runtime";

export const CreateRoot = (
    id: string,
    children: JSX.Element | JSX.Element[]
) => {
    if (document.querySelector(id)) {
        render(children, document.querySelector(id) as HTMLElement);
        return;
    }
};
