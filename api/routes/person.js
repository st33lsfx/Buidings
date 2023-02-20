import express from "express";
import {getPerson} from "../controller/person.js";

const router = express.Router();

router.get('/', getPerson)
router.get('/:id', getPerson)
export default router