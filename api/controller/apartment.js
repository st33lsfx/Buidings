import {db} from "../config/db.js";

export const getApartment = (req, res) => {
    const q = "SELECT * FROM apartment u JOIN building p ON u.building_id=p.id JOIN person n ON u.building_id=n.id WHERE p.id=?";

    db.query(q, [req.params.id], (err, data) => {
        if (err) return res.json(err)

        return res.status(200).json(data);
    })
}