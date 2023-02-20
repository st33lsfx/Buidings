import React, {useState, useEffect} from "react";
import axios from "axios";
import {Link} from "react-router-dom";
import {Table} from "flowbite-react";

const BuildingsList = () => {
    const [buildings, setBuildings] = useState([]);

    useEffect(() => {
        async function fetchData() {
            try {
                const res = await axios.get('http://localhost:8800/api/building')
                setBuildings( res.data );
            } catch (error) {
                throw error;
            }
        }
        fetchData()

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
                        {buildings.map( (building, index) => (

                            <Table.Row className="bg-white dark:border-gray-700 dark:bg-gray-800 text-center" key={index}>
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
                                    {building.description_number}
                                </Table.Cell>
                                <Table.Cell>
                                    {building.post_zip}
                                </Table.Cell>
                                <Table.Cell>
                                    <Link key={index} to={`/apartment/${building.id}`}>Show apartments</Link>
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