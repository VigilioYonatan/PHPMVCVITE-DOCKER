import { FormControlsCustom } from "control-react-hook-form";
import { AuthLoginSchema, AuthRegisterSchema } from "./auth.schema";
export const authLoginForm: FormControlsCustom<AuthLoginSchema> = {
    email: {
        type: "email",
        name: "email",
        title: "correo electrónico",
        placeholder: "tu email",
    },
    password: {
        type: "password",
        name: "password",
        title: "contraseña",
        placeholder: "tu contraseña",
    },
};

export const authRegisterForm: FormControlsCustom<AuthRegisterSchema> = {
    nombre: {
        type: "text",
        name: "nombre",
        title: "nombre",
        placeholder: "tu nombre",
    },
    email: {
        type: "email",
        name: "email",
        title: "correo electrónico",
        placeholder: "tu email",
    },
    password: {
        type: "password",
        name: "password",
        title: "contraseña",
        placeholder: "tu contraseña",
    },
};
