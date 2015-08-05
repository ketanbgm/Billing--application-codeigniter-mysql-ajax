#
# TABLE STRUCTURE FOR: customer_master
#

DROP TABLE IF EXISTS customer_master;

CREATE TABLE `customer_master` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `cname` varchar(30) DEFAULT NULL,
  `clname` varchar(30) DEFAULT NULL,
  `cgender` varchar(10) DEFAULT NULL,
  `caddress` varchar(50) DEFAULT NULL,
  `cdob` date DEFAULT NULL,
  `canndate` date DEFAULT NULL,
  `contactno` varchar(15) DEFAULT NULL,
  `cemailid` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=latin1;

INSERT INTO customer_master (`cid`, `cname`, `clname`, `cgender`, `caddress`, `cdob`, `canndate`, `contactno`, `cemailid`) VALUES (31, 'rahul', 'patil', 'male', '', NULL, NULL, '', '');
INSERT INTO customer_master (`cid`, `cname`, `clname`, `cgender`, `caddress`, `cdob`, `canndate`, `contactno`, `cemailid`) VALUES (32, 'ketan', 'pradhan', 'MALE', 'bgm', NULL, NULL, NULL, NULL);
INSERT INTO customer_master (`cid`, `cname`, `clname`, `cgender`, `caddress`, `cdob`, `canndate`, `contactno`, `cemailid`) VALUES (33, 'vinay', 'prabhu', 'MALE', 'BGM', NULL, NULL, NULL, NULL);
INSERT INTO customer_master (`cid`, `cname`, `clname`, `cgender`, `caddress`, `cdob`, `canndate`, `contactno`, `cemailid`) VALUES (35, 'aparna', 'P', 'female', NULL, NULL, NULL, NULL, NULL);
INSERT INTO customer_master (`cid`, `cname`, `clname`, `cgender`, `caddress`, `cdob`, `canndate`, `contactno`, `cemailid`) VALUES (36, 'vinod', 'p', 'male', NULL, NULL, NULL, NULL, NULL);
INSERT INTO customer_master (`cid`, `cname`, `clname`, `cgender`, `caddress`, `cdob`, `canndate`, `contactno`, `cemailid`) VALUES (37, 'xyz', 'abc', 'male', NULL, NULL, NULL, NULL, NULL);
INSERT INTO customer_master (`cid`, `cname`, `clname`, `cgender`, `caddress`, `cdob`, `canndate`, `contactno`, `cemailid`) VALUES (42, 'dsfdsf', 'dsfd', 'female', NULL, NULL, NULL, NULL, NULL);
INSERT INTO customer_master (`cid`, `cname`, `clname`, `cgender`, `caddress`, `cdob`, `canndate`, `contactno`, `cemailid`) VALUES (43, 'hgjnkjkk', 'jkhkj', 'male', NULL, NULL, NULL, NULL, NULL);
INSERT INTO customer_master (`cid`, `cname`, `clname`, `cgender`, `caddress`, `cdob`, `canndate`, `contactno`, `cemailid`) VALUES (44, 'jk', 'jk', 'female', NULL, NULL, NULL, NULL, NULL);
INSERT INTO customer_master (`cid`, `cname`, `clname`, `cgender`, `caddress`, `cdob`, `canndate`, `contactno`, `cemailid`) VALUES (45, 'sd', 'asd', 'female', NULL, NULL, NULL, NULL, NULL);
INSERT INTO customer_master (`cid`, `cname`, `clname`, `cgender`, `caddress`, `cdob`, `canndate`, `contactno`, `cemailid`) VALUES (47, 'dasdw', 'daasd', 'female', NULL, NULL, NULL, NULL, NULL);
INSERT INTO customer_master (`cid`, `cname`, `clname`, `cgender`, `caddress`, `cdob`, `canndate`, `contactno`, `cemailid`) VALUES (51, 'fghh', 'fhfhf', 'male', '', NULL, NULL, '', '');
INSERT INTO customer_master (`cid`, `cname`, `clname`, `cgender`, `caddress`, `cdob`, `canndate`, `contactno`, `cemailid`) VALUES (52, 'jk', 'hkhjk', 'female', '', NULL, NULL, '', '');
INSERT INTO customer_master (`cid`, `cname`, `clname`, `cgender`, `caddress`, `cdob`, `canndate`, `contactno`, `cemailid`) VALUES (60, 'rtg', 'gfd', 'female', NULL, NULL, NULL, NULL, NULL);
INSERT INTO customer_master (`cid`, `cname`, `clname`, `cgender`, `caddress`, `cdob`, `canndate`, `contactno`, `cemailid`) VALUES (61, 'hjkhj', 'hjkhj', 'male', NULL, NULL, NULL, NULL, NULL);
INSERT INTO customer_master (`cid`, `cname`, `clname`, `cgender`, `caddress`, `cdob`, `canndate`, `contactno`, `cemailid`) VALUES (62, 'fgf', 'gfg', 'female', NULL, NULL, NULL, NULL, NULL);
INSERT INTO customer_master (`cid`, `cname`, `clname`, `cgender`, `caddress`, `cdob`, `canndate`, `contactno`, `cemailid`) VALUES (63, 'sad', 'sd', 'male', NULL, NULL, NULL, NULL, NULL);
INSERT INTO customer_master (`cid`, `cname`, `clname`, `cgender`, `caddress`, `cdob`, `canndate`, `contactno`, `cemailid`) VALUES (64, 'll', 'll', 'male', NULL, NULL, NULL, NULL, NULL);
INSERT INTO customer_master (`cid`, `cname`, `clname`, `cgender`, `caddress`, `cdob`, `canndate`, `contactno`, `cemailid`) VALUES (65, 'sfssd', 'fdfdf', 'female', NULL, NULL, NULL, NULL, NULL);
INSERT INTO customer_master (`cid`, `cname`, `clname`, `cgender`, `caddress`, `cdob`, `canndate`, `contactno`, `cemailid`) VALUES (66, 'abc', 'asdasd', 'female', '', NULL, NULL, '', '');
INSERT INTO customer_master (`cid`, `cname`, `clname`, `cgender`, `caddress`, `cdob`, `canndate`, `contactno`, `cemailid`) VALUES (68, 'wqer', 'ewrwe', 'male', 'dfasddsa', '1993-02-09', NULL, '7795', 'kkk@gmail.com');
INSERT INTO customer_master (`cid`, `cname`, `clname`, `cgender`, `caddress`, `cdob`, `canndate`, `contactno`, `cemailid`) VALUES (69, 'disha', 'shah', 'female', '', NULL, NULL, '', '');
INSERT INTO customer_master (`cid`, `cname`, `clname`, `cgender`, `caddress`, `cdob`, `canndate`, `contactno`, `cemailid`) VALUES (70, 'riya', 'asdasd', 'female', '', NULL, NULL, '', '');
INSERT INTO customer_master (`cid`, `cname`, `clname`, `cgender`, `caddress`, `cdob`, `canndate`, `contactno`, `cemailid`) VALUES (71, 'rahul', 'desai', 'male', NULL, NULL, NULL, NULL, NULL);
INSERT INTO customer_master (`cid`, `cname`, `clname`, `cgender`, `caddress`, `cdob`, `canndate`, `contactno`, `cemailid`) VALUES (72, 'rahul', 'hghghf', 'male', NULL, NULL, NULL, NULL, NULL);
INSERT INTO customer_master (`cid`, `cname`, `clname`, `cgender`, `caddress`, `cdob`, `canndate`, `contactno`, `cemailid`) VALUES (73, 'qwerty', 'wq', 'male', NULL, NULL, NULL, NULL, NULL);
INSERT INTO customer_master (`cid`, `cname`, `clname`, `cgender`, `caddress`, `cdob`, `canndate`, `contactno`, `cemailid`) VALUES (74, 'qwe', 'eqw', 'male', NULL, NULL, NULL, NULL, NULL);
INSERT INTO customer_master (`cid`, `cname`, `clname`, `cgender`, `caddress`, `cdob`, `canndate`, `contactno`, `cemailid`) VALUES (75, 'qwre', 'weqw', 'female', NULL, NULL, NULL, NULL, NULL);
INSERT INTO customer_master (`cid`, `cname`, `clname`, `cgender`, `caddress`, `cdob`, `canndate`, `contactno`, `cemailid`) VALUES (79, 'vicky', 'p', 'male', '', NULL, NULL, '9999985555', '');
INSERT INTO customer_master (`cid`, `cname`, `clname`, `cgender`, `caddress`, `cdob`, `canndate`, `contactno`, `cemailid`) VALUES (80, 'wqe', 'weqw', '-1', NULL, NULL, NULL, NULL, NULL);


#
# TABLE STRUCTURE FOR: emp_master
#

DROP TABLE IF EXISTS emp_master;

CREATE TABLE `emp_master` (
  `eid` int(20) NOT NULL AUTO_INCREMENT,
  `ename` varchar(20) DEFAULT NULL,
  `eaddress` varchar(50) DEFAULT NULL,
  `eno` varchar(20) DEFAULT NULL,
  `edob` date DEFAULT NULL,
  `egender` varchar(6) DEFAULT NULL,
  `edoj` date DEFAULT NULL,
  `eavd` date DEFAULT NULL,
  PRIMARY KEY (`eid`),
  KEY `eid` (`eid`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

INSERT INTO emp_master (`eid`, `ename`, `eaddress`, `eno`, `edob`, `egender`, `edoj`, `eavd`) VALUES (14, 'demo', 'ad', '1423659870', '2015-03-01', 'Male', '2015-03-02', '2015-03-03');
INSERT INTO emp_master (`eid`, `ename`, `eaddress`, `eno`, `edob`, `egender`, `edoj`, `eavd`) VALUES (18, 'ketan', 'aaa', '2147483647', '0000-00-00', 'Male', '0000-00-00', '0000-00-00');
INSERT INTO emp_master (`eid`, `ename`, `eaddress`, `eno`, `edob`, `egender`, `edoj`, `eavd`) VALUES (19, 'vinay', 'fgfg', '2147483647', '0000-00-00', 'Male', '0000-00-00', '0000-00-00');
INSERT INTO emp_master (`eid`, `ename`, `eaddress`, `eno`, `edob`, `egender`, `edoj`, `eavd`) VALUES (20, 'viany', 'aaa', '8529637410', '0000-00-00', 'Male', '0000-00-00', '0000-00-00');
INSERT INTO emp_master (`eid`, `ename`, `eaddress`, `eno`, `edob`, `egender`, `edoj`, `eavd`) VALUES (21, 'ttt', 'ttt', '5263417890', '2015-03-01', 'Male', '2015-03-02', '2015-03-03');
INSERT INTO emp_master (`eid`, `ename`, `eaddress`, `eno`, `edob`, `egender`, `edoj`, `eavd`) VALUES (22, 'yy', 'jj', '5632147896', '2015-03-01', 'Male', '2015-03-02', '2015-02-24');
INSERT INTO emp_master (`eid`, `ename`, `eaddress`, `eno`, `edob`, `egender`, `edoj`, `eavd`) VALUES (27, 'kp', 'dsa', '1234567890', '2015-03-01', 'male', '2015-03-02', '2015-03-03');
INSERT INTO emp_master (`eid`, `ename`, `eaddress`, `eno`, `edob`, `egender`, `edoj`, `eavd`) VALUES (28, 'jhhg', 'jhg', '7456981230', '2015-03-01', 'male', '2015-03-02', '2015-03-03');
INSERT INTO emp_master (`eid`, `ename`, `eaddress`, `eno`, `edob`, `egender`, `edoj`, `eavd`) VALUES (29, 'amit', 'dsas', '4125637890', '2015-03-02', 'male', '2015-03-09', '2015-03-03');
INSERT INTO emp_master (`eid`, `ename`, `eaddress`, `eno`, `edob`, `egender`, `edoj`, `eavd`) VALUES (33, 'dasdsdasddasdas', 'dasd', '2031456789', '2015-03-01', 'male', '2015-03-02', '2015-03-03');
INSERT INTO emp_master (`eid`, `ename`, `eaddress`, `eno`, `edob`, `egender`, `edoj`, `eavd`) VALUES (37, 'amit', 'sdsa', '2013456978', '2015-03-01', 'male', '2015-03-02', '2015-03-03');
INSERT INTO emp_master (`eid`, `ename`, `eaddress`, `eno`, `edob`, `egender`, `edoj`, `eavd`) VALUES (38, 'amit', 'dasdas', '4215630789', '2015-03-01', 'male', '2015-03-02', '2015-03-04');
INSERT INTO emp_master (`eid`, `ename`, `eaddress`, `eno`, `edob`, `egender`, `edoj`, `eavd`) VALUES (40, 'we', 'sd', '5236147890', '2015-03-01', 'male', '2015-03-02', '2015-03-03');
INSERT INTO emp_master (`eid`, `ename`, `eaddress`, `eno`, `edob`, `egender`, `edoj`, `eavd`) VALUES (41, 'aparna', 'bgm', '9874563210', '2001-03-07', 'female', '2015-03-12', NULL);
INSERT INTO emp_master (`eid`, `ename`, `eaddress`, `eno`, `edob`, `egender`, `edoj`, `eavd`) VALUES (42, 'rahul', 'bgm', '9874521360', '1998-03-12', 'male', '2015-03-03', NULL);
INSERT INTO emp_master (`eid`, `ename`, `eaddress`, `eno`, `edob`, `egender`, `edoj`, `eavd`) VALUES (43, 'demo', 'demo', '9563214780', '1994-06-14', 'female', '2015-01-06', NULL);
INSERT INTO emp_master (`eid`, `ename`, `eaddress`, `eno`, `edob`, `egender`, `edoj`, `eavd`) VALUES (44, 'shweta', 'bgm', '9874563210', '1989-02-09', 'female', '2011-03-02', NULL);
INSERT INTO emp_master (`eid`, `ename`, `eaddress`, `eno`, `edob`, `egender`, `edoj`, `eavd`) VALUES (45, 'ertret', '-', '', NULL, 'female', NULL, NULL);
INSERT INTO emp_master (`eid`, `ename`, `eaddress`, `eno`, `edob`, `egender`, `edoj`, `eavd`) VALUES (46, 'test1', '-', '', NULL, 'male', NULL, NULL);
INSERT INTO emp_master (`eid`, `ename`, `eaddress`, `eno`, `edob`, `egender`, `edoj`, `eavd`) VALUES (47, 'thakurdfg45465766575', 'bgm', '98866552424466646444', '2015-04-02', 'male', '2015-04-01', '2015-04-08');
INSERT INTO emp_master (`eid`, `ename`, `eaddress`, `eno`, `edob`, `egender`, `edoj`, `eavd`) VALUES (49, 'John', '-', '', NULL, 'male', NULL, NULL);
INSERT INTO emp_master (`eid`, `ename`, `eaddress`, `eno`, `edob`, `egender`, `edoj`, `eavd`) VALUES (50, 'asdadsd', '-', '', NULL, 'female', NULL, NULL);
INSERT INTO emp_master (`eid`, `ename`, `eaddress`, `eno`, `edob`, `egender`, `edoj`, `eavd`) VALUES (51, 'siya ', '-', '2222222222', NULL, 'female', NULL, NULL);


#
# TABLE STRUCTURE FOR: therapy
#

DROP TABLE IF EXISTS therapy;

CREATE TABLE `therapy` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `tname` varchar(100) DEFAULT NULL,
  `amount` int(10) DEFAULT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

INSERT INTO therapy (`tid`, `tname`, `amount`) VALUES (14, 'HAIR-HAIRCUT-Deepak-F', 600);
INSERT INTO therapy (`tid`, `tname`, `amount`) VALUES (15, 'HAIR-HAIRCUT-Deepak-M', 300);
INSERT INTO therapy (`tid`, `tname`, `amount`) VALUES (16, 'HAIR-HAIRCUT-Senior-F', 500);
INSERT INTO therapy (`tid`, `tname`, `amount`) VALUES (17, 'HAIR-HAIRCUT-Senior-M', 300);
INSERT INTO therapy (`tid`, `tname`, `amount`) VALUES (18, 'HAIR-HAIRWASH-shmp+cond+bldry', 500);
INSERT INTO therapy (`tid`, `tname`, `amount`) VALUES (19, 'HAIR-HAIRWASH-shmp+cond+Style', 600);
INSERT INTO therapy (`tid`, `tname`, `amount`) VALUES (20, 'HAIR-SCALP THERIPIES-L\'Oreal express Ritual', 1000);
INSERT INTO therapy (`tid`, `tname`, `amount`) VALUES (21, 'HAIR-SCALP THERIPIES-L\'Oreal Mythic Ritual', 1200);
INSERT INTO therapy (`tid`, `tname`, `amount`) VALUES (22, 'HAIR-SCALP THERIPIES-L\'Oreal Protein Ritual', 1500);
INSERT INTO therapy (`tid`, `tname`, `amount`) VALUES (23, 'HAIR-SCALP THERIPIES-L\'Oreal Luxury Ritual', 2000);
INSERT INTO therapy (`tid`, `tname`, `amount`) VALUES (24, 'BEAUTY-FACIALS-Fresh Fruit Facial ', 2000);
INSERT INTO therapy (`tid`, `tname`, `amount`) VALUES (25, 'BEAUTY-FACIALS-Signature Facial ', 2500);
INSERT INTO therapy (`tid`, `tname`, `amount`) VALUES (26, 'BEAUTY-FACIALS-Whitening Facial', 2200);
INSERT INTO therapy (`tid`, `tname`, `amount`) VALUES (27, 'BEAUTY-FACIALS-Radiance Facial', 2200);
INSERT INTO therapy (`tid`, `tname`, `amount`) VALUES (28, 'BEAUTY-FACIALS-Anti Ageing Facial', 2200);
INSERT INTO therapy (`tid`, `tname`, `amount`) VALUES (29, 'BEAUTY-FACIALS-Gold Sheen Facial', 2200);
INSERT INTO therapy (`tid`, `tname`, `amount`) VALUES (30, 'BEAUTY-FACIALS-Anti Tan Facial                                 ', 1800);
INSERT INTO therapy (`tid`, `tname`, `amount`) VALUES (31, 'BEAUTY-FACIALS-Normal Facial', 800);
INSERT INTO therapy (`tid`, `tname`, `amount`) VALUES (32, 'BEAUTY-FACIALS-Express Facial', 500);
INSERT INTO therapy (`tid`, `tname`, `amount`) VALUES (33, 'BEAUTY-LUXURY FACIALS-Pearl  ', 4000);
INSERT INTO therapy (`tid`, `tname`, `amount`) VALUES (34, 'BEAUTY-LUXURY FACIALS-Gold', 4500);
INSERT INTO therapy (`tid`, `tname`, `amount`) VALUES (35, 'BEAUTY-LUXURY FACIALS-Platinum', 5000);
INSERT INTO therapy (`tid`, `tname`, `amount`) VALUES (36, 'BEAUTY-HANDS AND FEET-Deluxe Manicure', 400);
INSERT INTO therapy (`tid`, `tname`, `amount`) VALUES (37, 'BEAUTY-HANDS AND FEET-Spa Manicure	', 600);
INSERT INTO therapy (`tid`, `tname`, `amount`) VALUES (38, 'BEAUTY-HANDS AND FEET-Deluxe Pedicure', 500);
INSERT INTO therapy (`tid`, `tname`, `amount`) VALUES (39, 'BEAUTY-HANDS AND FEET-Spa Pedicure', 800);
INSERT INTO therapy (`tid`, `tname`, `amount`) VALUES (40, 'BEAUTY-HANDS AND FEET-Gel Nail Polish', 1000);
INSERT INTO therapy (`tid`, `tname`, `amount`) VALUES (41, 'BEAUTY-WAXING-Full Body', 1000);
INSERT INTO therapy (`tid`, `tname`, `amount`) VALUES (42, 'BEAUTY-WAXING-Hands/Underarms/Legs', 600);
INSERT INTO therapy (`tid`, `tname`, `amount`) VALUES (43, 'SKIN-SIGN EXP-Trupti ', 4000);
INSERT INTO therapy (`tid`, `tname`, `amount`) VALUES (44, 'SKIN-SIGN EXP-Jivaniya ', 4000);
INSERT INTO therapy (`tid`, `tname`, `amount`) VALUES (45, 'SKIN-SIGN EXP-Enzyme Wrap', 1500);
INSERT INTO therapy (`tid`, `tname`, `amount`) VALUES (46, 'SKIN-SIGN EXP-Chandan Wrap', 1500);
INSERT INTO therapy (`tid`, `tname`, `amount`) VALUES (47, 'SKIN-BODY THRPY-Indonesian Massage', 2200);
INSERT INTO therapy (`tid`, `tname`, `amount`) VALUES (48, 'SKIN-BODY THRPY-Aromatheraphy Massage', 2200);
INSERT INTO therapy (`tid`, `tname`, `amount`) VALUES (49, 'SKIN-BODY THRPY-Swedish Massage', 2200);
INSERT INTO therapy (`tid`, `tname`, `amount`) VALUES (50, 'SKIN-BODY THRPY-Foot Reflexology', 1000);
INSERT INTO therapy (`tid`, `tname`, `amount`) VALUES (51, 'SKIN-BODY THRPY-Asian massage', 500);
INSERT INTO therapy (`tid`, `tname`, `amount`) VALUES (52, 'SKIN-BODY THRPY-Back Facial', 1000);
INSERT INTO therapy (`tid`, `tname`, `amount`) VALUES (53, 'SKIN-BODY RITUALS-Coconut Scrub', 2000);
INSERT INTO therapy (`tid`, `tname`, `amount`) VALUES (54, 'SKIN-BODY RITUALS-French Lavender Polish', 2000);
INSERT INTO therapy (`tid`, `tname`, `amount`) VALUES (55, 'SKIN-BODY RITUALS-22 Indian Herbal Scrub', 2000);
INSERT INTO therapy (`tid`, `tname`, `amount`) VALUES (56, 'SKIN-SPA INDULGENCE-SOUNDARYA', 6000);
INSERT INTO therapy (`tid`, `tname`, `amount`) VALUES (58, 'SKIN-SPA INDULGENCE-SUKHA BLISS ', 5000);


#
# TABLE STRUCTURE FOR: bill
#

DROP TABLE IF EXISTS bill;

CREATE TABLE `bill` (
  `bid` int(11) NOT NULL AUTO_INCREMENT,
  `bill_date` date DEFAULT NULL,
  `cid` int(11) DEFAULT NULL,
  `bill_no` varchar(50) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `net` int(11) DEFAULT NULL,
  PRIMARY KEY (`bid`),
  KEY `bill_ibfk_1` (`cid`),
  CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `customer_master` (`cid`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=latin1;

INSERT INTO bill (`bid`, `bill_date`, `cid`, `bill_no`, `discount`, `total`, `net`) VALUES (85, '2015-04-10', 31, 'Bill-85', 10, 900, 890);
INSERT INTO bill (`bid`, `bill_date`, `cid`, `bill_no`, `discount`, `total`, `net`) VALUES (86, '2015-04-10', 71, 'Bill-86', 0, 1800, 1800);
INSERT INTO bill (`bid`, `bill_date`, `cid`, `bill_no`, `discount`, `total`, `net`) VALUES (87, '2015-04-10', 72, 'Bill-87', 200, 3700, 3500);
INSERT INTO bill (`bid`, `bill_date`, `cid`, `bill_no`, `discount`, `total`, `net`) VALUES (88, '2015-04-10', 73, 'Bill-88', 0, 300, 300);
INSERT INTO bill (`bid`, `bill_date`, `cid`, `bill_no`, `discount`, `total`, `net`) VALUES (89, '2015-04-10', 74, 'Bill-89', 0, 500, 500);
INSERT INTO bill (`bid`, `bill_date`, `cid`, `bill_no`, `discount`, `total`, `net`) VALUES (90, '2015-04-10', 75, 'Bill-90', 100, 500, 400);
INSERT INTO bill (`bid`, `bill_date`, `cid`, `bill_no`, `discount`, `total`, `net`) VALUES (91, '2015-04-10', 31, 'Bill-91', 10, 600, 590);
INSERT INTO bill (`bid`, `bill_date`, `cid`, `bill_no`, `discount`, `total`, `net`) VALUES (93, '2015-04-10', 79, 'BILL-93', 100, 1100, 1000);
INSERT INTO bill (`bid`, `bill_date`, `cid`, `bill_no`, `discount`, `total`, `net`) VALUES (94, '2015-04-11', 80, 'BILL-94', 0, 0, 0);
INSERT INTO bill (`bid`, `bill_date`, `cid`, `bill_no`, `discount`, `total`, `net`) VALUES (95, '2015-04-11', 80, 'BILL-95', 0, 500, 500);


#
# TABLE STRUCTURE FOR: bill_sub
#

DROP TABLE IF EXISTS bill_sub;

CREATE TABLE `bill_sub` (
  `bid` int(11) DEFAULT NULL,
  `bs_id` int(11) NOT NULL AUTO_INCREMENT,
  `bs_tid` int(11) DEFAULT NULL,
  `to` int(20) DEFAULT NULL,
  KEY `bs_id` (`bs_id`),
  KEY `bill_sub_ibfk_2` (`bs_tid`),
  KEY `bid` (`bid`),
  CONSTRAINT `bill_sub_ibfk_2` FOREIGN KEY (`bs_tid`) REFERENCES `therapy` (`tid`) ON UPDATE CASCADE,
  CONSTRAINT `bill_sub_ibfk_3` FOREIGN KEY (`bid`) REFERENCES `bill` (`bid`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=144 DEFAULT CHARSET=latin1;

INSERT INTO bill_sub (`bid`, `bs_id`, `bs_tid`, `to`) VALUES (85, 125, 15, 300);
INSERT INTO bill_sub (`bid`, `bs_id`, `bs_tid`, `to`) VALUES (85, 126, 19, 600);
INSERT INTO bill_sub (`bid`, `bs_id`, `bs_tid`, `to`) VALUES (86, 127, 17, 300);
INSERT INTO bill_sub (`bid`, `bs_id`, `bs_tid`, `to`) VALUES (86, 128, 22, 1500);
INSERT INTO bill_sub (`bid`, `bs_id`, `bs_tid`, `to`) VALUES (88, 131, 17, 300);
INSERT INTO bill_sub (`bid`, `bs_id`, `bs_tid`, `to`) VALUES (87, 132, 21, 1200);
INSERT INTO bill_sub (`bid`, `bs_id`, `bs_tid`, `to`) VALUES (87, 133, 25, 2500);
INSERT INTO bill_sub (`bid`, `bs_id`, `bs_tid`, `to`) VALUES (89, 134, 16, 500);
INSERT INTO bill_sub (`bid`, `bs_id`, `bs_tid`, `to`) VALUES (90, 135, 16, 500);
INSERT INTO bill_sub (`bid`, `bs_id`, `bs_tid`, `to`) VALUES (91, 136, 19, 600);
INSERT INTO bill_sub (`bid`, `bs_id`, `bs_tid`, `to`) VALUES (93, 140, 14, 600);
INSERT INTO bill_sub (`bid`, `bs_id`, `bs_tid`, `to`) VALUES (93, 141, 18, 500);
INSERT INTO bill_sub (`bid`, `bs_id`, `bs_tid`, `to`) VALUES (94, 142, NULL, NULL);
INSERT INTO bill_sub (`bid`, `bs_id`, `bs_tid`, `to`) VALUES (95, 143, 18, 500);


#
# TABLE STRUCTURE FOR: receipt_master
#

DROP TABLE IF EXISTS receipt_master;

CREATE TABLE `receipt_master` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `rec_numb` varchar(20) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL,
  `rdate` date DEFAULT NULL,
  `rectot` int(11) DEFAULT NULL,
  PRIMARY KEY (`rid`),
  KEY `cid` (`cid`),
  CONSTRAINT `receipt_master_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `customer_master` (`cid`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

INSERT INTO receipt_master (`rid`, `rec_numb`, `cid`, `rdate`, `rectot`) VALUES (1, 'receipt-1', 31, '2015-04-10', 90);
INSERT INTO receipt_master (`rid`, `rec_numb`, `cid`, `rdate`, `rectot`) VALUES (2, 'receipt-2', 31, '2015-04-10', 800);
INSERT INTO receipt_master (`rid`, `rec_numb`, `cid`, `rdate`, `rectot`) VALUES (3, 'receipt-3', 71, '2015-04-10', 200);
INSERT INTO receipt_master (`rid`, `rec_numb`, `cid`, `rdate`, `rectot`) VALUES (4, 'receipt-4', 71, '2015-04-10', 400);
INSERT INTO receipt_master (`rid`, `rec_numb`, `cid`, `rdate`, `rectot`) VALUES (5, 'RECEIPT-5', 31, '2015-04-10', 590);
INSERT INTO receipt_master (`rid`, `rec_numb`, `cid`, `rdate`, `rectot`) VALUES (6, 'RECEIPT-6', 72, '2015-04-10', 500);
INSERT INTO receipt_master (`rid`, `rec_numb`, `cid`, `rdate`, `rectot`) VALUES (7, 'RECEIPT-7', 79, '2015-04-10', 500);
INSERT INTO receipt_master (`rid`, `rec_numb`, `cid`, `rdate`, `rectot`) VALUES (8, 'RECEIPT-8', 79, '2015-04-10', 500);
INSERT INTO receipt_master (`rid`, `rec_numb`, `cid`, `rdate`, `rectot`) VALUES (9, 'RECEIPT-9', 74, '2015-04-10', 50);
INSERT INTO receipt_master (`rid`, `rec_numb`, `cid`, `rdate`, `rectot`) VALUES (10, 'RECEIPT-10', 71, '2015-04-10', 400);
INSERT INTO receipt_master (`rid`, `rec_numb`, `cid`, `rdate`, `rectot`) VALUES (11, 'RECEIPT-11', 71, '2015-04-11', 100);


#
# TABLE STRUCTURE FOR: receipt_sub
#

DROP TABLE IF EXISTS receipt_sub;

CREATE TABLE `receipt_sub` (
  `rs_id` int(11) NOT NULL AUTO_INCREMENT,
  `rid` int(11) DEFAULT NULL,
  `recamt` float DEFAULT NULL,
  `bid` int(11) DEFAULT NULL,
  PRIMARY KEY (`rs_id`),
  KEY `rid` (`rid`),
  KEY `bid` (`bid`),
  CONSTRAINT `receipt_sub_ibfk_1` FOREIGN KEY (`rid`) REFERENCES `receipt_master` (`rid`) ON UPDATE CASCADE,
  CONSTRAINT `receipt_sub_ibfk_2` FOREIGN KEY (`bid`) REFERENCES `bill` (`bid`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

INSERT INTO receipt_sub (`rs_id`, `rid`, `recamt`, `bid`) VALUES (1, 1, '90', 85);
INSERT INTO receipt_sub (`rs_id`, `rid`, `recamt`, `bid`) VALUES (2, 2, '800', 85);
INSERT INTO receipt_sub (`rs_id`, `rid`, `recamt`, `bid`) VALUES (3, 3, '200', 86);
INSERT INTO receipt_sub (`rs_id`, `rid`, `recamt`, `bid`) VALUES (4, 4, '400', 86);
INSERT INTO receipt_sub (`rs_id`, `rid`, `recamt`, `bid`) VALUES (5, 5, '590', 91);
INSERT INTO receipt_sub (`rs_id`, `rid`, `recamt`, `bid`) VALUES (6, 6, '500', 87);
INSERT INTO receipt_sub (`rs_id`, `rid`, `recamt`, `bid`) VALUES (7, 7, '500', 93);
INSERT INTO receipt_sub (`rs_id`, `rid`, `recamt`, `bid`) VALUES (8, 8, '500', 93);
INSERT INTO receipt_sub (`rs_id`, `rid`, `recamt`, `bid`) VALUES (9, 9, '50', 89);
INSERT INTO receipt_sub (`rs_id`, `rid`, `recamt`, `bid`) VALUES (10, 10, '400', 86);
INSERT INTO receipt_sub (`rs_id`, `rid`, `recamt`, `bid`) VALUES (11, 11, '100', 86);


