import {db} from "../config/db.js";

export const getBuildings = (req, res) => {
    const q = "SELECT * FROM building";

    db.query(q, [req.params.id], (err, data) => {
        if (err) return res.json(err)

        return res.status(200).json(data);
    })
}