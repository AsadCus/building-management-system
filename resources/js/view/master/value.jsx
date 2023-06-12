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

function Values() {
    const api = new Api();
    const filter = new Filter();

    const [rawData, setRawData] = useState([]);
    const [loadingData, setLoadingData] = useState(true);
    const [data, setData] = useState([]);

    useEffect(() => {
        async function getData() {
            api.getValue().then((response) => {
                setRawData(response.data.data);
                setData(response.data.data);
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
            Header: 'Form',
            accessor: 'form_name',
            Cell: tableProps => (
                <a href='#' className='text-primary text-center'>{tableProps.row.original.form.title}</a>
            )
        },
        {
            Header: 'Floor',
            accessor: 'floor_name',
            Cell: tableProps => (
                <a href='#' className='text-primary text-center'>{tableProps.row.original.floor.name}</a>
            )
        },
        {
            Header: 'Room',
            accessor: 'room_name',
            Cell: tableProps => (
                <a href='#' className='text-primary text-center'>{tableProps.row.original.room.name}</a>
            )
        },
        {
            Header: 'User',
            accessor: 'user_name',
            Cell: tableProps => (
                <p>{tableProps.row.original.user}</p>
            )
        },
        {
            Header: 'Type',
            accessor: 'type',
            Cell: tableProps => (
                <p className="capitalize">{tableProps.row.original.form.type}</p>
            )
        },
        {
            Header: 'Value',
            accessor: 'value',
            Cell: tableProps => (
                <p>{tableProps.row.original.value}</p>
            )
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
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2 mb-5">
                <a href="/value/create" className="btn btn-rounded-primary shadow-md mr-1">
                    <svg xmlns="http://www.w3.org/2000/svg" className="icon icon-tabler icon-tabler-plus" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                    <span>&nbsp;Add Value&nbsp;</span>
                </a>

                <div class="hidden md:block mx-auto text-slate-500">
                    {/* Showing 1 to 10 of 150 entries */}
                </div>
                <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0 flex">
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

export default Values;

if (document.getElementById("master-value")) {
    ReactDOM.render(<Values />, document.getElementById("master-value"));
}
