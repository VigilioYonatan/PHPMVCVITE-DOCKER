import { BASE_URL } from "~/utils/axios.util";
import { AuthLoginSchema, AuthRegisterSchema } from "../auth.schema";

export async function authLoginFetch(url: string, props: AuthLoginSchema) {
    const { data } = await BASE_URL.post(url, props);
    return data;
}
export async function authRegisterFetch(
    url: string,
    props: AuthRegisterSchema
) {
    const { data } = await BASE_URL.post(url, props);
    return data;
}
