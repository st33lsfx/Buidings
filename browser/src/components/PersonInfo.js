import React, {useEffect, useState} from 'react';
import {Table} from "flowbite-react";
import {Link, useParams} from "react-router-dom";
import axios from "axios";

function PersonInfo(props) {
    const [person, setPerson] = useState([]);
    const {id} = useParams();

    useEffect(() => {
        const fetchData = async () => {
            try {
                const res = await axios.get(`http://localhost:8800/api/person/${id}`)
                setPerson(res.data);
            } catch (err) {
                console.log(err)
            }
        };
        fetchData();
    }, [id]);

    return (
        <>
            <div className="flex flex-row justify-center items-center text-center m-16">
                <p className="text-3xl font-bold">Owner detail</p>
            </div>
            <div className="m-24">
                <div className="mb-12">
                    <Link to="/">Zpět na domovskou stránku</Link>
                </div>
                <Table>
                    <Table.Head className="text-center">
                        <Table.HeadCell>
                            ID
                        </Table.HeadCell>
                        <Table.HeadCell>
                            Name
                        </Table.HeadCell>
                        <Table.HeadCell>
                            Surname
                        </Table.HeadCell>
                        <Table.HeadCell>
                           Phone
                        </Table.HeadCell>
                        <Table.HeadCell>
                            Email
                        </Table.HeadCell>
                    </Table.Head>
                    <Table.Body className="divide-y">
                        { person.map(( person ) => (

                            <Table.Row className="bg-white dark:border-gray-700 dark:bg-gray-800 text-center" key={person.id}>
                                <Table.Cell>
                                    {person.id}
                                </Table.Cell>
                                <Table.Cell>
                                    {person.first_name}
                                </Table.Cell>
                                <Table.Cell>
                                    {person.last_name}
                                </Table.Cell>
                                <Table.Cell>
                                    {person.phone}
                                </Table.Cell>
                                <Table.Cell>
                                    {person.email}
                                </Table.Cell>
                            </Table.Row>
                        ))}
                    </Table.Body>
                </Table>
            </div>
        </>
    );
}

export default PersonInfo;