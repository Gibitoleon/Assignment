const express = require('express');
const sendemail = require('../Controller/controller')
const route = express.Router();

route.route('/sendemail').post(sendemail);

module.exports =route;