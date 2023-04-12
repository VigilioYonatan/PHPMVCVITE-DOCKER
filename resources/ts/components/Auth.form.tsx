import { JSX } from "preact/jsx-runtime";
import BookmarkIcon from "@heroicons/react/24/outline/BookmarkIcon";

type AuthFormProps = {
    onSubmit: () => void;
    isLoading: boolean;
    children: JSX.Element | JSX.Element[];
};
export function AuthForm({ isLoading, onSubmit, children }: AuthFormProps) {
    return (
        <form onSubmit={onSubmit} noValidate>
            {children}
            <button className="bg-primary hover:bg-opacity-70 py-2  px-4 flex items-center mx-auto rounded-lg font-bold uppercase text-white">
                {isLoading ? (
                    "Cargando..."
                ) : (
                    <>
                        <BookmarkIcon className="mr-2 w-5 h-5" />
                        Agregar
                    </>
                )}
            </button>
        </form>
    );
}

{
    /* <h6 className="text-gray2 text-sm mt-3 mb-6 font-bold uppercase">
User Information
</h6>
<div className="flex flex-wrap">
<div className="w-full lg:w-6/12 px-4">
    {/*  */
}
// </div>
// <div className="w-full lg:w-6/12 px-4">
//     <div className="relative w-full mb-3">
//         <label
//             className="block uppercase text-grayHard dark:text-white text-xs font-bold mb-2"
//             htmlFor="grid-password"
//         >
//             Email address
//         </label>
//         <input
//             type="email"
//             className="border-0 px-3 py-3 dark:text-white bg-background-light dark:bg-background-dark  rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
//             defaultValue="jesse@example.com"
//         />
//     </div>
// </div>
// <div className="w-full lg:w-6/12 px-4">
//     <div className="relative w-full mb-3">
//         <label
//             className="block uppercase text-grayHard dark:text-white text-xs font-bold mb-2"
//             htmlFor="grid-password"
//         >
//             First Name
//         </label>
//         <input
//             type="text"
//             className="border-0 px-3 py-3 dark:text-white bg-background-light dark:bg-background-dark  rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
//             defaultValue="Lucky"
//         />
//     </div>
// </div>
// <div className="w-full lg:w-6/12 px-4">
//     <div className="relative w-full mb-3">
//         <label
//             className="block uppercase text-grayHard dark:text-white text-xs font-bold mb-2"
//             htmlFor="grid-password"
//         >
//             Last Name
//         </label>
//         <input
//             type="text"
//             className="border-0 px-3 py-3 dark:text-white bg-background-light dark:bg-background-dark  rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
//             defaultValue="Jesse"
//         />
//     </div>
// </div>
// </div>

// <hr className="mt-6 border-b-1 " />

// <h6 className="text-gray2 text-sm mt-3 mb-6 font-bold uppercase">
// Contact Information
// </h6>
// <div className="flex flex-wrap">
// <div className="w-full lg:w-12/12 px-4">
//     <div className="relative w-full mb-3">
//         <label
//             className="block uppercase text-grayHard dark:text-white text-xs font-bold mb-2"
//             htmlFor="grid-password"
//         >
//             Address
//         </label>
//         <input
//             type="text"
//             className="border-0 px-3 py-3 dark:text-white bg-background-light dark:bg-background-dark  rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
//             defaultValue="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09"
//         />
//     </div>
// </div>
// <div className="w-full lg:w-4/12 px-4">
//     <div className="relative w-full mb-3">
//         <label
//             className="block uppercase text-grayHard dark:text-white text-xs font-bold mb-2"
//             htmlFor="grid-password"
//         >
//             City
//         </label>
//         <input
//             type="email"
//             className="border-0 px-3 py-3 dark:text-white bg-background-light dark:bg-background-dark  rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
//             defaultValue="New York"
//         />
//     </div>
// </div>
// <div className="w-full lg:w-4/12 px-4">
//     <div className="relative w-full mb-3">
//         <label
//             className="block uppercase text-grayHard dark:text-white text-xs font-bold mb-2"
//             htmlFor="grid-password"
//         >
//             Country
//         </label>
//         <input
//             type="text"
//             className="border-0 px-3 py-3 dark:text-white bg-background-light dark:bg-background-dark  rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
//             defaultValue="United States"
//         />
//     </div>
// </div>
// <div className="w-full lg:w-4/12 px-4">
//     <div className="relative w-full mb-3">
//         <label
//             className="block uppercase text-grayHard  dark:text-white text-xs font-bold mb-2"
//             htmlFor="grid-password"
//         >
//             Postal Code
//         </label>
//         <input
//             type="text"
//             className="border-0 px-3 py-3 dark:text-white bg-background-light dark:bg-background-dark  rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
//             defaultValue="Postal Code"
//         />
//     </div>
// </div>
// </div>

// <hr className="mt-6 border-b-1 " />

// <h6 className="text-gray2 text-sm mt-3 mb-6 font-bold uppercase">
// About Me
// </h6>
// <div className="flex flex-wrap">
// <div className="w-full lg:w-12/12 px-4">
//     <div className="relative w-full mb-3">
//         <label
//             className="block uppercase text-grayHard dark:text-white text-xs font-bold mb-2"
//             htmlFor="grid-password"
//         >
//             About me
//         </label>
//         <textarea
//             className="border-0 px-3 py-3 placeholder-blueGray-300 dark:text-white bg-background-light dark:bg-background-dark rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
//             defaultValue="A beautiful UI Kit and Admin for React & Tailwind CSS. It is Free and Open Source."
//             rows={4}
//         ></textarea>
//     </div>
// </div>
// </div>
