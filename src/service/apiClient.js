import axios from "axios";

const apiClient = axios.create({
    baseURL: "http://127.0.0.1:8000/api/", //prende la base url dal env
    withCredentials: false,
    headers: {
        Accept: "application/json",
        "Content-Type": "application/json",
    },
});

export default {
    //creare funzione che ritorna apiClient piu metodo alla quale si passa slug url
    getOrdini() {
        return apiClient.get('ordini')
    },
    getOrdiniDesc() {
        return apiClient.get('ordini-inverse')
    }
};
