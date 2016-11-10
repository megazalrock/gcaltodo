import _ from 'lodash';
import reqest from 'superagent';
import md5 from 'js-md5';

function save_user(email, token){
	var apiRoot = '/api/';
	reqest
		.put(apiRoot + ['users', md5(email)])
		.query({
			key : token
		})
		.end((err, res) => {
			console.log(res.body);
		});

}