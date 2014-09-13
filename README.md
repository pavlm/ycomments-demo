
Installation of ycomments-demo site
===========================================

# 1. clone demo project
git clone https://github.com/pavlm/ycomments-demo.git

# 2. clone ycomments module
git clone https://github.com/pavlm/ycomments.git ycomments-demo/protected/modules/ycomments

# 3. create yii runtime folders
mkdir ycomments-demo/{assets,protected/runtime}

# 4. create ycomments_demo database

# 5. install database schema
mysql ycomments_demo < ycomments-demo/protected/data/ycomments_demo.schema.sql

# 6. setup and open site. select "load fixtures" from top menu. go to "news item 1" menu and try YComments
