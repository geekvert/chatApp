# chatApp
A chatting application build with php.

## Setup instructions
Create three tables rahul_users, rahul_profiles, rahul_messages according to gin schemas.

# Table schemas
rahul_users
```sql
+-----------+--------------+------+-----+---------+----------------+
| Field     | Type         | Null | Key | Default | Extra          |
+-----------+--------------+------+-----+---------+----------------+
| id        | int(11)      | NO   | PRI | NULL    | auto_increment |
| name      | varchar(100) | YES  |     | NULL    |                |
| username  | varchar(100) | YES  |     | NULL    |                |
| email     | varchar(100) | YES  |     | NULL    |                |
| mobile    | varchar(100) | YES  |     | NULL    |                |
| gender    | varchar(10)  | YES  |     | NULL    |                |
| password  | varchar(255) | YES  |     | NULL    |                |
| education | varchar(100) | YES  |     | NULL    |                |
| address   | varchar(100) | YES  |     | NULL    |                |
| age       | varchar(3)   | YES  |     | NULL    |                |
| about     | varchar(100) | YES  |     | NULL    |                |
+-----------+--------------+------+-----+---------+----------------+
```
rahul_profiles
```sql
+------------+--------------+------+-----+---------+----------------+
| Field      | Type         | Null | Key | Default | Extra          |
+------------+--------------+------+-----+---------+----------------+
| id         | int(11)      | NO   | PRI | NULL    | auto_increment |
| user_id    | int(11)      | NO   | MUL | NULL    |                |
| profilePic | varchar(255) | YES  |     | NULL    |                |
| complete   | varchar(10)  | YES  |     | NULL    |                |
+------------+--------------+------+-----+---------+----------------+
```
rahul_messages
```sql
+-------------+--------------+------+-----+-------------------+----------------+
| Field       | Type         | Null | Key | Default           | Extra          |
+-------------+--------------+------+-----+-------------------+----------------+
| id          | int(11)      | NO   | PRI | NULL              | auto_increment |
| sender_id   | varchar(10)  | YES  |     | NULL              |                |
| receiver_id | varchar(10)  | YES  |     | NULL              |                |
| message     | varchar(255) | YES  |     | NULL              |                |
| time        | timestamp    | NO   |     | CURRENT_TIMESTAMP |                |
+-------------+--------------+------+-----+-------------------+----------------+
```
