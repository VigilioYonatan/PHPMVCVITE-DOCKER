import * as z from "zod";

export const authLoginSchema = z.object({
    email: z.string(),
    password: z.string(),
});
export type AuthLoginSchema = z.infer<typeof authLoginSchema>;

export const authRegisterchema = z.object({
    nombre:z.string(),
    email: z.string(),
    password: z.string(),
});
export type AuthRegisterSchema = z.infer<typeof authRegisterchema>;
