# -*- coding: utf-8 -*-
import requests
import json
import time
import re
from time import sleep
import sys
reload(sys)
sys.setdefaultencoding('utf8')

ics = [
    '411481199512082192',
    '360123200103180015',
    '371421198704060015',
    '340881198810121856',
    '513030199201296111',
]

url = 'http://select.pdgzf.com/api/api/Qualification/GetBillStateByIDCard'

headers = {
    'content-type': 'application/json',
    #'Accept-Language': 'en,zh-CN;q=0.9,zh;q=0.8,ja;q=0.7,zh-TW;q=0.6',
    'User-Agent': 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36',
    'nonce': 'ODRKRIBQ7QZ9PY8DF4UVSVBCTZZBGSOO',
#    'Accept': 'application/json, text/plain, */*',
    'timestamp': '2Q4WPX3MNM2CTLUQBE92X9U538JT6IMH',
    'signature': 'B9Z7ZCW2X622X68MYCZAIZ8EANH477ZS',
    'token': '9UCTCTZ74IE7TJ6QWQB5KEOCQFXQBEAB',
}

def check(idc,t):
    p = {
        'IDCard': idc
    }
    r = requests.post(url = url, data = json.dumps(p), headers=headers)
    r = r.json()
    if r['StatusCode'] == 200:
        data = r['Data']
        data = json.loads(data)
        if data['flag']:
            print t + ':' + idc + ';SUCCESS' + ';msg:' + data['status']
        else:
            print t + ':' + idc + '; FAILED' + ';msg:' + data['status']
    else:
        print r

t = str(time.strftime("%Y-%m-%d %H:%M:%S", time.localtime()))

for idc in ics:
    check(idc, t)
    sleep(0.5)


