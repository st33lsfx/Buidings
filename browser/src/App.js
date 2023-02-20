import React from 'react';
import {BrowserRouter, Route, Routes} from "react-router-dom";
import BuildingsList from "./components/BuildingsList";
import ApartmentsList from "./components/ApartmentsList";
import PersonInfo from "./components/PersonInfo";

function App() {
    return (
        <BrowserRouter>
            <Routes>
                <Route path="/" element={<BuildingsList/>}/>
                <Route path="/apartment/:id" element={<ApartmentsList/>}/>
                <Route path="/person/:id" element={<PersonInfo/>}/>
            </Routes>
        </BrowserRouter>
    );
}

export default App;