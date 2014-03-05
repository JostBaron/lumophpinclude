CREATE TABLE tx_lumophpinclude_validurls (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,

    url text NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid)
);