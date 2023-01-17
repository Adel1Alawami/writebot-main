const express = require('express');
const bodyParser = require('body-parser');
const cors = require('cors');
const { generateasnwer } = require('../controllers/openaiController');
const { generateImage } = require('../controllers/dalleController');
const router = express.Router();


router.post('/generateanswer' , generateasnwer);
router.post('/generateimage' , generateImage);


module.exports = router;