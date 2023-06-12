import axios from "axios";

export default class Api {
    constructor() {
        this.api_url = "http://localhost:8000/api/";
    }

    init = () => {
        let headers = {
            Accept: "application/json",
            "Content-Type": "application/x-www-form-urlencoded",
        };
        this.client = axios.create({
            baseURL: this.api_url,
            timeout: 31000,
            headers: headers,
        });
        return this.client;
    };

    getMaintenance = () => {
        return this.init()
            .get(`maintenance`)
            .catch((error) => {
                // this.addError(error.message);
            });
    };

    getForm = () => {
        return this.init()
            .get(`form`)
            .catch((error) => {
                // this.addError(error.message);
            });
    };

    getValue = () => {
        return this.init()
            .get(`value`)
            .catch((error) => {
                // this.addError(error.message);
            });
    };

    getBuilding = () => {
        return this.init()
            .get(`building`)
            .catch((error) => {
                // this.addError(error.message);
            });
    };

    getFloor = () => {
        return this.init()
            .get(`floor`)
            .catch((error) => {
                // this.addError(error.message);
            });
    };

    getRoom = () => {
        return this.init()
            .get(`room`)
            .catch((error) => {
                // this.addError(error.message);
            });
    };

    /*
     *|--------------------------------------------------------------------------
     *| Api for select
     *|--------------------------------------------------------------------------
     */

    getMaintenanceSelect = (id) => {
        return this.init()
            .get(`maintenance/select`)
            .catch((error) => {});
    };

    getFormSelect = (id) => {
        return this.init()
            .get(`form/select`)
            .catch((error) => {});
    };

    getBuildingSelect = (id) => {
        return this.init()
            .get(`building/select`)
            .catch((error) => {});
    };

    getFloorSelect = (id) => {
        return this.init()
            .get(`floor/select`)
            .catch((error) => {});
    };

    getRoomSelect = (id) => {
        return this.init()
            .get(`room/select`)
            .catch((error) => {});
    };

}
