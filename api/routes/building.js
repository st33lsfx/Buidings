import express from "express";
import {getBuildings} from "../controller/building.js";

const router = express.Router();

router.get("/", getBuildings)
export default router