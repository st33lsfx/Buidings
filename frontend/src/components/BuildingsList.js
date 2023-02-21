import React, {useState, useEffect} from "react";
import axios from "axios";
import {Link} from "react-router-dom";
import { Table } from "flowbite-react";

const BuildingsList = () => {
    const [buildings, setBuildings] = useState([]);

    useEffect(() => {
        async function getData() {
            try {
                const res = await axios.get( '/api/building/')
                setBuildings( res.data );
                console.log(res.data)
            } catch (error) {
                throw error;
            }
        }
        getData()

    }, []);


    return (
        <>
            <div className="flex flex-row justify-center items-center text-center m-16">
                <p className="text-3xl font-bold">List buildings</p>
            </div>
            <div className="m-24">
                <Table>
                    <Table.Head className="text-center">
                        <Table.HeadCell>
                            ID
                        </Table.HeadCell>
                        <Table.HeadCell>
                            Title
                        </Table.HeadCell>
                        <Table.HeadCell>
                            Address
                        </Table.HeadCell>
                        <Table.HeadCell>
                            Description number
                        </Table.HeadCell>
                        <Table.HeadCell>
                            Post ZIP
                        </Table.HeadCell>
                        <Table.HeadCell>
                            Apartment
                        </Table.HeadCell>
                    </Table.Head>

                    <Table.Body className="divide-y">

                        { buildings.map( (building) => (
                            <Table.Row className="bg-white dark:border-gray-700 dark:bg-gray-800 text-center" key={building.id}>
                                <Table.Cell>
                                    {building.id}
                                </Table.Cell>
                                <Table.Cell>
                                    {building.title}
                                </Table.Cell>
                                <Table.Cell>
                                    {building.address}
                                </Table.Cell>
                                <Table.Cell>
                                    {building.descriptionNumber}
                                </Table.Cell>
                                <Table.Cell>
                                    {building.postZip}
                                </Table.Cell>
                                <Table.Cell>
                                    <Link to={`/apartment/${building.id}`} className="hover:text-blue-700">Show apartments</Link>
                                </Table.Cell>
                            </Table.Row>
                        ))}
                    </Table.Body>
                </Table>
            </div>
        </>
    );
};

export default BuildingsList;