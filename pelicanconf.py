#!/usr/bin/env python
# -*- coding: utf-8 -*- #
from __future__ import unicode_literals

AUTHOR = u'Andy Li'
AUTHOR_SAVE_AS = False
SITENAME = u"Andy Li's Blog"
# SITEURL = 'http://blog.onthewings.net'

TIMEZONE = 'Hongkong'

DEFAULT_LANG = u'en'

DEFAULT_CATEGORY = 'uncategorized'

ARTICLE_URL = '{date:%Y}/{date:%m}/{date:%d}/{slug}/'
ARTICLE_SAVE_AS = '{date:%Y}/{date:%m}/{date:%d}/{slug}/index.html'
PAGE_URL = '{slug}/'
PAGE_SAVE_AS = '{slug}/index.html'
TAG_URL = 'tag/{slug}/'
TAG_SAVE_AS = 'tag/{slug}/index.html'
CATEGORY_URL = 'category/{slug}/'
CATEGORY_SAVE_AS = 'category/{slug}/index.html'

FEED_DOMAIN = 'http://feeds.feedburner.com'
FEED_ALL_ATOM = 'feed/atom.xml'
TAG_FEED_ATOM = 'tag/%s/feed/atom.xml'
CATEGORY_FEED_ATOM = 'category/%s/feed/atom.xml'
AUTHOR_FEED_ATOM = None
AUTHOR_FEED_RSS = None
TRANSLATION_FEED_ATOM = None
FEED_MAX_ITEMS = 10

PAGINATION_PATTERNS = (
    (1, '{base_name}/', '{base_name}/index.html'),
    (2, '{base_name}/page/{number}/', '{base_name}/page/{number}/index.html'),
)

# Social widget
SOCIAL = (
	('Twitter (andy_li)', 'https://twitter.com/andy_li'),
)

PLUGIN_PATHS = ['../pelican-plugins']
PLUGINS = ['summary']

TYPOGRIFY = True

DISQUS_SITENAME = 'blog-onthewings'

THEME = 'theme'
DEFAULT_PAGINATION = 10

# Uncomment following line if you want document-relative URLs when developing
#RELATIVE_URLS = True

FILENAME_METADATA = r'(?P<date>\d{4}-\d{2}-\d{2})_(?P<slug>.*)'

DISPLAY_CATEGORIES_ON_MENU = False