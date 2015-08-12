#from datetime import datetime, timedelta
import datetime
import pysvn 
from time import mktime
import sys
import json
import types

#fill below variables user_name,password,repo_path
user_name = ""
password =""
repo_path = "" #https://xx.xx.xx.xx/SVN/RePo

branches_path = str(repo_path) + str("/branches")


def ssl_server_trust_prompt(trust_dict):
    return True, trust_dict['failures'], True
    #return retcode, accepted_failures, save

def login(*args):
    #name = raw_input("Enter your svn login : ")
    #password = getpass.getpass("Enter your svn password :")
    #return True, name, password, False
    return True, user_name, password, False


def main():
   res = []
   branch = str(sys.argv[1])
   from_date = str(sys.argv[2])
   to_date = str(sys.argv[3])
   from_date_l = from_date.split("/")
   to_date_l = to_date.split("/")
   f_date = datetime.date(int(from_date_l[2]),int(from_date_l[0]),int(from_date_l[1]))
   t_date = datetime.date(int(to_date_l[2]),int(to_date_l[0]),int(to_date_l[1]))
   res.append(branch)
   res.append(from_date)
   res.append(to_date)
   client = pysvn.Client()
   client.callback_get_login = login
   client.callback_ssl_server_trust_prompt = ssl_server_trust_prompt
   today = t_date
   yday = f_date
   branch_url = branches_path + str(branch)
   log_messages = client.log( branch_url,
        revision_start=pysvn.Revision(pysvn.opt_revision_kind.date, mktime(yday.timetuple())),
        revision_end=pysvn.Revision( pysvn.opt_revision_kind.date, mktime(today.timetuple())),
        discover_changed_paths=True,
        limit=0)
   res = {}
   for x in log_messages:
      """
      print x['revision'].number
      print x['message']
      print x['author']
      """
      res[x['revision'].number]={"message": x['message'],"author":x['author']}
   res_keys = res.keys()
   res_keys.sort()
   res_sorted={}
   for ke in res_keys:
      res_sorted[ke] = res[ke]
   print json.dumps(res_sorted)

if __name__ == "__main__":
  main()
