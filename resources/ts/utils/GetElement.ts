const GetElement = <Elemento extends HTMLElement>(
    element: string,
    cb: ((el: Elemento) => void) | null = null
) => {
    const elemento = document.querySelector(element) as Elemento;
    if (cb) {
        cb(elemento);
    }
    return elemento;
};

export default GetElement;
