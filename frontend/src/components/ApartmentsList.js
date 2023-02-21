import React, {useEffect, useState } from 'react';
import axios from "axios";
import {Table} from "flowbite-react";
import {Link, useParams} from "react-router-dom";

function ApartmentsList() {
    const [apartments, setApartments] = useState([]);
    const {id} = useParams();

    useEffect(() => {
        const fetchData = async () => {
            try {
                const res = await axios.get(`/api/apartment/${id}`)
                setApartments(res.data);
            } catch (err) {
                console.log(err)
            }
        };
        fetchData();
    }, [id]);


    return (
        <>
            <div className="flex flex-row justify-center items-center text-center m-16">
                <p className="text-3xl font-bold">List apartments</p>
            </div>
            <div className="m-24">
                <Table>
                    <Table.Head className="text-center">
                        <Table.HeadCell>
                            ID
                        </Table.HeadCell>
                        <Table.HeadCell>
                            Building
                        </Table.HeadCell>
                        <Table.HeadCell>
                            Title
                        </Table.HeadCell>
                        <Table.HeadCell>
                            Owner
                        </Table.HeadCell>
                        <Table.HeadCell>
                            Size
                        </Table.HeadCell>
                        <Table.HeadCell>
                            Cold water status
                        </Table.HeadCell>
                        <Table.HeadCell>
                            Hot water status
                        </Table.HeadCell>
                        <Table.HeadCell>
                            Gas water status
                        </Table.HeadCell>
                        <Table.HeadCell>
                            Square status
                        </Table.HeadCell>
                    </Table.Head>
                    <Table.Body className="divide-y">
                        { apartments.map(( apartment ) => (

                            <Table.Row className="bg-white dark:border-gray-700 dark:bg-gray-800 text-center" key={apartment.id}>
                                <Table.Cell>
                                    {apartment.id}
                                </Table.Cell>
                                <Table.Cell>
                                    {apartment.building['title']}
                                </Table.Cell>
                                <Table.Cell>
                                    {apartment.title}
                                </Table.Cell>
                                <Table.Cell>
                                    {apartment.person['first_name']}
                                </Table.Cell>
                                <Table.Cell>
                                    {apartment.size}
                                </Table.Cell>
                                <Table.Cell>
                                    {apartment.cold_water_status} m3
                                </Table.Cell>
                                <Table.Cell>
                                    {apartment.hot_water_status} m3
                                </Table.Cell>
                                <Table.Cell>
                                    {apartment.gas_meter_status} m3
                                </Table.Cell>
                                <Table.Cell>
                                    {apartment.square_status} m3
                                </Table.Cell>
                                <Table.Cell>
                                   <Link to={`/person/${apartment.person['id']}`}>Show person detail</Link>
                                </Table.Cell>
                            </Table.Row>
                            ))}
                    </Table.Body>
                </Table>
            </div>
        </>
    );
}

export default ApartmentsList;