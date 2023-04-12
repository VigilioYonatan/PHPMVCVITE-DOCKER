import { FormController, FormControlComponent } from "control-react-hook-form";

export function AuthControl<T extends object>(props: FormControlComponent<T>) {
    return (
        <FormController {...props} className="relative w-full mb-3">
            <FormController.label className="block uppercase text-grayHard dark:text-white text-xs font-bold mb-2" />
            <FormController.control className="border-0 px-3 py-3 dark:text-white bg-background-light dark:bg-background-dark  rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" />
            <FormController.error className="text-red-600 text-xs mt-1" />
        </FormController>
    );
}
