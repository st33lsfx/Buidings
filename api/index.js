import express from 'express';
import cors from 'cors';
import Building from "./routes/building.js";
import Apartment from "./routes/apartment.js";
import Person from "./routes/person.js";


const PORT = process.env.PORT || 8800;

const app = express()

app.use(cors())
app.use(express.json())
app.use("/api/building", Building)
app.use("/api/apartment", Apartment)
app.use("/api/person", Person)

app.listen(PORT, () => {
    console.log(`Connected! ${PORT}`)
})