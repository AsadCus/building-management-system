function TabelHiddenColumn(props) {
    return (
        <>
            <div className="dropdown">
                <button
                    className="dropdown-toggle btn px-2 box"
                    aria-expanded="false"
                    data-tw-toggle="dropdown"
                >
                    <span className="w-5 h-5 flex items-center justify-center">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            className="icon icon-tabler icon-tabler-adjustments"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            strokeWidth="2"
                            stroke="currentColor"
                            fill="none"
                            strokeLinecap="round"
                            strokeLinejoin="round"
                        >
                            <path
                                stroke="none"
                                d="M0 0h24v24H0z"
                                fill="none"
                            ></path>
                            <circle cx="6" cy="10" r="2"></circle>
                            <line x1="6" y1="4" x2="6" y2="8"></line>
                            <line x1="6" y1="12" x2="6" y2="20"></line>
                            <circle cx="12" cy="16" r="2"></circle>
                            <line x1="12" y1="4" x2="12" y2="14"></line>
                            <line x1="12" y1="18" x2="12" y2="20"></line>
                            <circle cx="18" cy="7" r="2"></circle>
                            <line x1="18" y1="4" x2="18" y2="5"></line>
                            <line x1="18" y1="9" x2="18" y2="20"></line>
                        </svg>
                    </span>
                </button>
                <div className="dropdown-menu w-40">
                    <ul className="dropdown-content">
                        {props.allColumns.map((column) => (
                            <li key={column.id}>
                                <button className="dropdown-item" href="#">
                                    <input
                                        type="checkbox"
                                        {...column.getToggleHiddenProps()}
                                    />
                                    &nbsp; {column.Header}
                                </button>
                            </li>
                        ))}
                    </ul>
                </div>
            </div>
        </>
    );
}

export default TabelHiddenColumn;
