import express from "express";
import {getApartment} from "../controller/apartment.js";

const router = express.Router();

router.get('/', getApartment)
router.get('/:id', getApartment)
export default router