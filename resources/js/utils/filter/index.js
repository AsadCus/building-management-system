
export default class Filter {

    search = (search, column, rawData) => {

        if (column === "maintenance" || column === "maintenance_name") {
            if (search === "All") {
                return rawData;
            } else {
                let data = column === "maintenance_name" ? rawData.filter((item) => item.maintenance_name === search) : rawData.filter((item) => item.maintenance.maintenance === search)
                return data;
            }
        } else if (column === "building" || column === "building_name") {
            if (search === "All") {
                return rawData;
            } else {
                let data = column === "building_name" ? rawData.filter((item) => item.building_name === search) : rawData.filter((item) => item.building.location_name === search)
                return data;
            }
        } else {
            let data = rawData.filter(item => eval("item." + column).toLowerCase().indexOf(search) > -1);
            return data;
        }
    };
    
}
