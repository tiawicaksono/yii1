/*
Navicat Oracle Data Transfer
Oracle Client Version : 10.2.0.5.0

Source Server         : apotek
Source Server Version : 100200
Source Host           : 127.0.0.1:1521
Source Schema         : APOTEK

Target Server Type    : ORACLE
Target Server Version : 100200
File Encoding         : 65001

Date: 2013-03-18 09:46:56
*/


-- ----------------------------
-- Table structure for "APOTEK"."AUTHASSIGNMENT"
-- ----------------------------
DROP TABLE "APOTEK"."AUTHASSIGNMENT";
CREATE TABLE "APOTEK"."AUTHASSIGNMENT" (
"ITEMNAME" VARCHAR2(64 BYTE) NOT NULL ,
"USERID" VARCHAR2(64 BYTE) NOT NULL ,
"BIZRULE" NVARCHAR2(200) NULL ,
"DATA" NVARCHAR2(200) NULL 
)
LOGGING
NOCOMPRESS
NOCACHE

;

-- ----------------------------
-- Records of AUTHASSIGNMENT
-- ----------------------------
INSERT INTO "APOTEK"."AUTHASSIGNMENT" VALUES ('manager', '3', null, 'N;');
INSERT INTO "APOTEK"."AUTHASSIGNMENT" VALUES ('Admin', '2', null, 'N;');

-- ----------------------------
-- Table structure for "APOTEK"."AUTHITEM"
-- ----------------------------
DROP TABLE "APOTEK"."AUTHITEM";
CREATE TABLE "APOTEK"."AUTHITEM" (
"NAME" VARCHAR2(64 BYTE) NOT NULL ,
"TYPE" NUMBER NULL ,
"DESCRIPTION" NVARCHAR2(200) NULL ,
"BIZRULE" NVARCHAR2(200) NULL ,
"DATA" NVARCHAR2(200) NULL 
)
LOGGING
NOCOMPRESS
NOCACHE

;

-- ----------------------------
-- Records of AUTHITEM
-- ----------------------------
INSERT INTO "APOTEK"."AUTHITEM" VALUES ('Site.*', '1', null, null, 'N;');
INSERT INTO "APOTEK"."AUTHITEM" VALUES ('User.*', '1', null, null, 'N;');
INSERT INTO "APOTEK"."AUTHITEM" VALUES ('Site.Index', '0', null, null, 'N;');
INSERT INTO "APOTEK"."AUTHITEM" VALUES ('Site.Error', '0', null, null, 'N;');
INSERT INTO "APOTEK"."AUTHITEM" VALUES ('Site.Contact', '0', null, null, 'N;');
INSERT INTO "APOTEK"."AUTHITEM" VALUES ('Site.Login', '0', null, null, 'N;');
INSERT INTO "APOTEK"."AUTHITEM" VALUES ('Site.Logout', '0', null, null, 'N;');
INSERT INTO "APOTEK"."AUTHITEM" VALUES ('User.View', '0', null, null, 'N;');
INSERT INTO "APOTEK"."AUTHITEM" VALUES ('User.Create', '0', null, null, 'N;');
INSERT INTO "APOTEK"."AUTHITEM" VALUES ('User.Update', '0', null, null, 'N;');
INSERT INTO "APOTEK"."AUTHITEM" VALUES ('User.Delete', '0', null, null, 'N;');
INSERT INTO "APOTEK"."AUTHITEM" VALUES ('User.Index', '0', null, null, 'N;');
INSERT INTO "APOTEK"."AUTHITEM" VALUES ('User.Admin', '0', null, null, 'N;');
INSERT INTO "APOTEK"."AUTHITEM" VALUES ('manager', '2', 'manager', 'manager', 'N;');

-- ----------------------------
-- Table structure for "APOTEK"."AUTHITEMCHILD"
-- ----------------------------
DROP TABLE "APOTEK"."AUTHITEMCHILD";
CREATE TABLE "APOTEK"."AUTHITEMCHILD" (
"PARENT" VARCHAR2(64 BYTE) NOT NULL ,
"CHILD" VARCHAR2(64 BYTE) NOT NULL 
)
LOGGING
NOCOMPRESS
NOCACHE

;

-- ----------------------------
-- Records of AUTHITEMCHILD
-- ----------------------------
INSERT INTO "APOTEK"."AUTHITEMCHILD" VALUES ('manager', 'User.Admin');
INSERT INTO "APOTEK"."AUTHITEMCHILD" VALUES ('manager', 'User.Index');

-- ----------------------------
-- Table structure for "APOTEK"."RIGHTS"
-- ----------------------------
DROP TABLE "APOTEK"."RIGHTS";
CREATE TABLE "APOTEK"."RIGHTS" (
"ITEMNAME" VARCHAR2(64 BYTE) NOT NULL ,
"TYPE" NUMBER NULL ,
"WEIGHT" NUMBER NULL 
)
LOGGING
NOCOMPRESS
NOCACHE

;

-- ----------------------------
-- Records of RIGHTS
-- ----------------------------

-- ----------------------------
-- Indexes structure for table AUTHASSIGNMENT
-- ----------------------------

-- ----------------------------
-- Primary Key structure for table "APOTEK"."AUTHASSIGNMENT"
-- ----------------------------
ALTER TABLE "APOTEK"."AUTHASSIGNMENT" ADD PRIMARY KEY ("ITEMNAME", "USERID");

-- ----------------------------
-- Indexes structure for table AUTHITEM
-- ----------------------------

-- ----------------------------
-- Primary Key structure for table "APOTEK"."AUTHITEM"
-- ----------------------------
ALTER TABLE "APOTEK"."AUTHITEM" ADD PRIMARY KEY ("NAME");

-- ----------------------------
-- Indexes structure for table AUTHITEMCHILD
-- ----------------------------

-- ----------------------------
-- Primary Key structure for table "APOTEK"."AUTHITEMCHILD"
-- ----------------------------
ALTER TABLE "APOTEK"."AUTHITEMCHILD" ADD PRIMARY KEY ("PARENT", "CHILD");

-- ----------------------------
-- Indexes structure for table RIGHTS
-- ----------------------------

-- ----------------------------
-- Primary Key structure for table "APOTEK"."RIGHTS"
-- ----------------------------
ALTER TABLE "APOTEK"."RIGHTS" ADD PRIMARY KEY ("ITEMNAME");

-- ----------------------------
-- Foreign Key structure for table "APOTEK"."AUTHITEMCHILD"
-- ----------------------------
ALTER TABLE "APOTEK"."AUTHITEMCHILD" ADD FOREIGN KEY ("CHILD") REFERENCES "APOTEK"."AUTHITEM" ("NAME") ON DELETE CASCADE;
ALTER TABLE "APOTEK"."AUTHITEMCHILD" ADD FOREIGN KEY ("PARENT") REFERENCES "APOTEK"."AUTHITEM" ("NAME") ON DELETE CASCADE;

-- ----------------------------
-- Foreign Key structure for table "APOTEK"."RIGHTS"
-- ----------------------------
ALTER TABLE "APOTEK"."RIGHTS" ADD FOREIGN KEY ("ITEMNAME") REFERENCES "APOTEK"."AUTHITEM" ("NAME") ON DELETE CASCADE;
