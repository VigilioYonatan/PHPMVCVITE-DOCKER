import { useForm } from "react-hook-form";
import { zodResolver } from "@hookform/resolvers/zod";
import { CreateRoot } from "~/utils/CreateRoot.util";
import { AuthForm } from "~/components/Auth.form";
import { AuthControl } from "~/components/Auth.control";
import { AuthLoginSchema, authLoginSchema } from "~/services/auth/auth.schema";
import { authLoginForm } from "../auth.form";
import { authApi } from "../apis/auth.api";

export function AuthLoginForm() {
    const { control, handleSubmit } = useForm<AuthLoginSchema>({
        resolver: zodResolver(authLoginSchema),
    });
    const { data, mutate, isLoading } = authApi().login();
    console.log({ data });

    function onAuthLogin(data: AuthLoginSchema) {
        mutate(data);
    }
    return (
        <AuthForm
            isLoading={isLoading || false}
            onSubmit={handleSubmit(onAuthLogin)}
        >
            <AuthControl control={control} {...authLoginForm.email} />
            <AuthControl control={control} {...authLoginForm.password} />
        </AuthForm>
    );
}

CreateRoot("[data-component='auth-login']", <AuthLoginForm />);
