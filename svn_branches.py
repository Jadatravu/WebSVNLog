import httplib2
import json
from BeautifulSoup import BeautifulSoup

#fill below variables user_name,password,repo_path
user_name = ""
password =""
repo_path = "" #https://xx.xx.xx.xx/SVN/RePo

branches_path = str(repo_path) + str("/branches")

def main():
    h = httplib2.Http(".cache", disable_ssl_certificate_validation=True)
    h.add_credentials(user_name, password)
    res,content = h.request(branches_path,headers={"User-Agent":"foo"})
    #print res
    print content
    print "end content"
    soup = BeautifulSoup(content)
    body = soup("li")
    print len(body)
    branches=[]
    for b in body:
        print b
        soup1 = BeautifulSoup(str(b))
        a = soup1("a")
        print a[0].getText()
        branches.append(a[0].getText())
    fi = open("/usr/local/share/WebSVNLog/svn_branches.json","w+")
    fi.write(json.dumps(branches))
    fi.close()

if __name__ == "__main__":
   main()

