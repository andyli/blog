#!/usr/bin/env python
# -*- coding: utf-8 -*- #
from __future__ import unicode_literals

AUTHOR = u'Andy Li'
AUTHOR_SAVE_AS = ''
SITENAME = u"Andy Li's Blog"
SITEURL = ''

TIMEZONE = 'Hongkong'

DEFAULT_LANG = u'en'

# Feed generation is usually not desired when developing
FEED_ALL_RSS = 'feeds/all.rss.xml'
CATEGORY_FEED_ATOM = None
TRANSLATION_FEED_ATOM = None

# Social widget
SOCIAL = (
	('Twitter (andy_li)', 'https://twitter.com/andy_li'),
)

PLUGIN_PATHS = ['../pelican-plugins']
PLUGINS = ['summary']

THEME = 'theme'
DEFAULT_PAGINATION = 10

# Uncomment following line if you want document-relative URLs when developing
#RELATIVE_URLS = True

FILENAME_METADATA = r'(?P<date>\d{4}-\d{2}-\d{2})_(?P<slug>.*)'

DISPLAY_CATEGORIES_ON_MENU = False