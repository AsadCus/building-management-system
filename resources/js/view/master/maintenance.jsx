import React, { useEffect, useState } from "react";
import ReactDOM from "react-dom";
import { useTable, usePagination, useSortBy } from "react-table";
import ReactTooltip from "react-tooltip";
import TabelFooter from "../../components/tabel_footer/index";
import Table from "../../components/table.jsx";
import TabelHiddenColumn from "../../components/table_hidden_column";
import TableLoading from "../../components/table_loding";
import TableSearch from "../../components/table_search";
import Api from "../../utils/api";
import Filter from "../../utils/filter";

function Maintenances() {
    const api = new Api();
    const filter = new Filter();

    const [rawData, setRawData] = useState([]);
    const [loadingData, setLoadingData] = useState(true);
    const [data, setData] = useState([]);

    useEffect(() => {
        async function getData() {
            api.getMaintenance().then((response) => {
                setRawData(response.data.data);
                setData(response.data.data);
                // console.log(response.data.data);
                setLoadingData(false);
            });
        }
        if (loadingData) {
            getData();
        }
    }, []);

    function SearchFilter(search, column) {
        let result = filter.search(search, column, rawData);
        setData(result);
    }

    function resetSearchFilter() {
        setData(rawData);
    }

    const columns = React.useMemo(

        () => [
        {
            Header: 'Maintenance',
            accessor: 'maintenance_name',
            Cell: tableProps => (
                <a href='#' className='text-primary text-center'>{tableProps.row.original.maintenance}</a>
            )
        },
        {
            Header: 'Description',
            accessor: 'description',
            Cell: tableProps => (
                <p>{tableProps.row.original.description}</p>
            )
        },
        {
            Header: 'Frequency',
            accessor: 'frequency',
            Cell: tableProps => (
                <p className="capitalize">{tableProps.row.original.frequency}</p>
            )
        },
        {
            Header: 'Type',
            accessor: 'type',
            Cell: tableProps => (
                <p className="capitalize">{tableProps.row.original.type}</p>
            )
        },
        {
            Header: () => <p className="text-center">ACTION</p>,
            accessor: "action",
            Cell: (tableProps) => (
                <>
                    <div className="border-l-2">
                        <div
                            class="flex justify-center items-center"
                            style={{ minWidth: 150 }}
                        >
                            <a
                                class="flex items-center mr-3"
                                href={"/maintenance/edit/" + tableProps.row.original.id}
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="24"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    icon-name="check-square"
                                    data-lucide="check-square"
                                    class="lucide lucide-check-square w-4 h-4 mr-1"
                                >
                                    <polyline points="9 11 12 14 22 4"></polyline>
                                    <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                                </svg>
                                Edit
                            </a>
                            <a
                                class="flex items-center text-danger modal-delete"
                                href="javascript:;"
                                data-tw-toggle="modal"
                                data-tw-target="#modal-delete"
                                data-id={tableProps.row.original.id}
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="24"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    icon-name="trash-2"
                                    data-lucide="trash-2"
                                    class="lucide lucide-trash-2 w-4 h-4 mr-1"
                                >
                                    <polyline points="3 6 5 6 21 6"></polyline>
                                    <path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"></path>
                                    <line
                                        x1="10"
                                        y1="11"
                                        x2="10"
                                        y2="17"
                                    ></line>
                                    <line
                                        x1="14"
                                        y1="11"
                                        x2="14"
                                        y2="17"
                                    ></line>
                                </svg>{" "}
                                Delete
                            </a>
                        </div>
                    </div>
                </>
            ),
        },
        ],
        []
    )

    const {
        getTableProps,
        getTableBodyProps,
        headerGroups,
        prepareRow,
        page,
        state,
        canNextPage,
        setPageSize,
        gotoPage,
        canPreviousPage,
        pageOptions,
        nextPage,
        allColumns,
        previousPage,
    } = useTable(
        {
            columns,
            data     ,initialState: { pageSize: 25 }   },
        useSortBy,  
        usePagination
    );
    const { pageIndex } = state;
    return (
        <>
            <div className="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2 mb-5">
                <a
                    href="/maintenance/create"
                    className="btn btn-rounded-primary shadow-md mr-1"
                >    
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        className="icon icon-tabler icon-tabler-plus"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        stroke-width="2"
                        stroke="currentColor"
                        fill="none"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >
                        <path
                            stroke="none"
                            d="M0 0h24v24H0z"
                            fill="none"
                        ></path>
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                    <span>&nbsp;Add Maintenance&nbsp;</span>
                </a>

                <div className="hidden md:block mx-auto text-slate-500">
                    {/* Showing 1 to 10 of 150 entries */}
                </div>
                <div className="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0 flex">
                    <TableSearch
                        className="flex-none"
                        columns={columns}
                        SearchFilter={SearchFilter}
                        resetSearchFilter={resetSearchFilter}
                    />
                    <div className="ml-2">
                        <TabelHiddenColumn
                            allColumns={allColumns}
                            className="flex-none"
                        />
                    </div>
                </div>
            </div>
            <div className="mt-8">
                <TabelFooter
                    gotoPage={gotoPage}
                    previousPage={previousPage}
                    nextPage={nextPage}
                    pageIndex={pageIndex}
                    canPreviousPage={canPreviousPage}
                    canNextPage={canNextPage}
                    setPageSize={setPageSize}
                    pageOptions={pageOptions}
                />
            </div>
            <Table
                getTableProps={getTableProps}
                prepareRow={prepareRow}
                getTableBodyProps={getTableBodyProps}
                headerGroups={headerGroups}
                page={page}
            />
        </>
    );
}

export default Maintenances;

if (document.getElementById("master-maintenance")) {
    ReactDOM.render(<Maintenances />, document.getElementById("master-maintenance"));
}
