const http = require('http');
var URL = require('url');
const hostname = '127.0.0.1';
const port = 8088;

http.createServer((req, res) => {
	res.statusCode = 200;
	res.setHeader('Content-type', 'text/plain');
	var args = URL.parse(req.url).query;
	console.log(args);
	res.write('you input is:');
	res.write(args);
	res.end('monitor server by node!');
}).listen(port, hostname, () => {
	console.log(`monitor server started...`);
})
