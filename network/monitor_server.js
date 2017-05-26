const http = require('http');
const hostname = '127.0.0.1';
const port = 8088;

http.createServer((req, res) => {
	res.statusCode = 200;
	res.setHeader('Content-type', 'text/plain');
	res.end('monitor server by node!');
}).listen(port, hostname, () => {
	console.log(`monitor server started...`);
})
