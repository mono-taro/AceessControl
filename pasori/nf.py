import nfc
import binascii
from nfc.clf import RemoteTarget
 
import hashlib


try: 
    #USB接続
    clf = nfc.ContactlessFrontend('usb')            #USBが接続されていない/接続不良の場合ここでエラーが起きる
    tag = clf.connect(rdwr={
        'on-connect': lambda tag: False
    })
    idm = binascii.hexlify(tag.idm)                 #取得した値を16進数に変換
    idm = hashlib.md5(idm).hexdigest()              #16進数に変換した値をMD5にハッシュ化                                                        
    print(idm)                                      #ハッシュ化した値を返却
    exit()


    
    
except AttributeError:
    print("error")
    exit()