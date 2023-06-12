import { useEffect, useState } from "react";
import Api from "../../utils/api";

const SearchSelectMaintenance = (props) => {
    const [rawData, setRawData] = useState([]);
    const [loadingData, setLoadingData] = useState(true);
    const api = new Api();
    useEffect(async () => {
        async function getData() {
            api.getMaintenanceSelect().then((response) => {
                setRawData(response.data.data);
                setLoadingData(false);
            });
        }
        if (loadingData) {
            getData();
        }
    });

    return (
        <select
            className="form-control"
            onChange={(e) =>
                props.SearchFilter(e.target.value, props.searchColumnID)
            }
        >
            <option key={'1'}>All</option>
            {rawData.map((item, i) => {
                return (
                    <option key={i} name={item}>
                        {item}
                    </option>
                );
            })}
        </select>
    );
};

const SearchSelectBuilding = (props) => {
    const [rawData, setRawData] = useState([]);
    const [loadingData, setLoadingData] = useState(true);
    const api = new Api();
    useEffect(async () => {
        async function getData() {
            api.getBuildingSelect().then((response) => {
                setRawData(response.data.data);
                setLoadingData(false);
            });
        }
        if (loadingData) {
            getData();
        }
    });

    return (
        <select
            className="form-control"
            onChange={(e) =>
                props.SearchFilter(e.target.value, props.searchColumnID)
            }
        >
            <option key={'1'}>All</option>
            {rawData.map((item, i) => {
                return (
                    <option key={i} name={item}>
                        {item}
                    </option>
                );
            })}
        </select>
    );
};

function TableSearch(props) {
    const [search, setSearch] = useState("");
    const [searchColumnID, setSearchColumnID] = useState(
        props.columns[0].accessor
    );
    const [column, setColumn] = useState(props.columns);

    const changeColumn = (el) => {
        setSearchColumnID(el.target.value),
            setSearch(""),
            props.resetSearchFilter();
    };

    return (
        <>
            <div className="flex w-full sm:w-auto">
                <div className="w-48 relative text-slate-500">
                    {/* {searchColumnID === "maintenance" ||
                    searchColumnID === "maintenance_name" ? (
                        <SearchSelectMaintenance
                            searchColumnID={searchColumnID}
                            SearchFilter={props.SearchFilter}
                        />
                    ) : searchColumnID === "building" ||
                      searchColumnID === "building_name" ? (
                        <SearchSelectBuilding
                            searchColumnID={searchColumnID}
                            SearchFilter={props.SearchFilter}
                        />
                    ) : ( */}
                        <>
                            <input
                                type="text"
                                value={search}
                                onChange={(e) => (
                                    props.SearchFilter(
                                        e.target.value,
                                        searchColumnID
                                    ),
                                    setSearch(e.target.value)
                                )}
                                className="form-control w-48 box pr-10"
                                placeholder="Search by invoice..."
                            />

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                strokeWidth="2"
                                strokeLinecap="round"
                                strokeLinejoin="round"
                                icon-name="search"
                                className="lucide lucide-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"
                                data-lucide="search"
                            >
                                <circle cx="11" cy="11" r="8"></circle>
                                <line
                                    x1="21"
                                    y1="21"
                                    x2="16.65"
                                    y2="16.65"
                                ></line>
                            </svg>
                        </>
                    {/* )} */}
                </div>
                <select className="form-select box ml-2" onChange={changeColumn}>
                    {column.map((item, i) => {
                        return (
                            <option value={item.accessor}>{item.Header}</option>
                        );
                    })}
                </select>
            </div>
        </>
    );
}

export default TableSearch;
