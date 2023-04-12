import { useForm } from "react-hook-form";
import { zodResolver } from "@hookform/resolvers/zod";
import { CreateRoot } from "~/utils/CreateRoot.util";
import { AuthForm } from "~/components/Auth.form";
import { AuthControl } from "~/components/Auth.control";
import {
    AuthRegisterSchema,
    authRegisterchema,
} from "~/services/auth/auth.schema";
import { authRegisterForm } from "../auth.form";
import { authApi } from "../apis/auth.api";

export function AuthRegisterForm() {
    const { control, handleSubmit } = useForm<AuthRegisterSchema>({
        resolver: zodResolver(authRegisterchema),
    });
    const { data, mutate, isLoading } = authApi().register();
    console.log({ data });

    function onAuthLogin(data: AuthRegisterSchema) {
        mutate(data);
    }
    return (
        <AuthForm
            isLoading={isLoading || false}
            onSubmit={handleSubmit(onAuthLogin)}
        >
            <AuthControl control={control} {...authRegisterForm.nombre} />
            <AuthControl control={control} {...authRegisterForm.email} />
            <AuthControl control={control} {...authRegisterForm.password} />
        </AuthForm>
    );
}

CreateRoot("[data-component='auth-register']", <AuthRegisterForm />);
