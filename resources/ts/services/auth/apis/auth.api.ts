import { useMutation } from "@vigilio/preact-fetching";
import { authLoginFetch, authRegisterFetch } from "./auth.fetch";

export function authApi() {
    const login = () => useMutation("/auth/login", authLoginFetch);
    const register = () => useMutation("/auth/register", authRegisterFetch);
    return { login, register };
}
