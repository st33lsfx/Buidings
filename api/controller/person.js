import {db} from "../config/db.js";

export const getPerson = (req, res) => {
    const q = "SELECT * FROM person u JOIN apartment p ON u.id=p.person_id WHERE p.person_id=?"

    db.query(q, [req.params.id], (err, data) => {
        if (err) return res.json(err)

        return res.status(200).json(data);
    })
}