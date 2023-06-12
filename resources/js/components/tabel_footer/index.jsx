function TabelFooter(props) {
return (
<>
    <div className=" intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center">
        <div>
            <select className="w-20 form-select box mt-3 sm:mt-0" value={props.pageSize} onChange={(e)=>
                props.setPageSize(Number(e.target.value))
                }
                >
                {[25, 50, 100].map((pageSize) => (
                <option key={pageSize} value={pageSize}>
                    {pageSize}
                </option>
                ))}
            </select>
        </div>
        <div className="hidden md:block mx-auto text-slate-500">
            {/* Showing 1 to 10 of 150 entries */}
            <span>
                Page{" "}
                <strong>
                    {props.pageIndex + 1} of {props.pageOptions.length}
                </strong>{" "}
            </span>
        </div>
        <div>
            <button onClick={()=> props.previousPage()}
                disabled={!props.canPreviousPage}
                className="btn btn-rounded-primary w-24 mr-1 mb-2"
                >
                Previous
            </button>{" "}
            <button onClick={()=> props.nextPage()}
                disabled={!props.canNextPage}
                className="btn btn-rounded-primary w-24 mr-1 mb-2"
                >
                Next
            </button>{" "}
        </div>
    </div>
</>
);
}

export default TabelFooter;
