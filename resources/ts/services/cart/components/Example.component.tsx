import { useQuery } from "@vigilio/preact-fetching";
import axios from "axios";
import { CreateRoot } from "~/helpers/CreateRoot";
async function exampleFetch(url: string) {
    const { data } = await axios.get(url);
    return data;
}
function ExampleComponent() {
    const { data, isLoading } = useQuery(
        "https://pokeapi.co/api/v2/pokemon/ditto",
        exampleFetch
    );
    console.log(isLoading);

    return <div>{JSON.stringify(data)}</div>;
}

CreateRoot("[data-component='users']", <ExampleComponent />);
