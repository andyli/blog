#!/usr/bin/env python
# -*- coding: utf-8 -*- #
from __future__ import unicode_literals

AUTHOR = u'Andy Li'
AUTHOR_SAVE_AS = False
SITENAME = u"Andy Li's Blog"
SITEURL = ''

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

FEED_ALL_ATOM = None
TAG_FEED_ATOM = None
CATEGORY_FEED_ATOM = None
AUTHOR_FEED_ATOM = None
AUTHOR_FEED_RSS = None
TRANSLATION_FEED_ATOM = None

PAGINATION_PATTERNS = (
    (1, '{base_name}/', '{base_name}/index.html'),
    (2, '{base_name}/page/{number}/', '{base_name}/page/{number}/index.html'),
)

# Social widget
SOCIAL = (
	('Twitter (andy_li)', 'https://twitter.com/andy_li'),
)

PLUGIN_PATHS = ['../pelican-plugins']
PLUGINS = [
	'summary',
	# 'w3c_validate',
]

TYPOGRIFY = True

PATH = 'content'

READERS = {'html': None}
STATIC_PATHS = [
	'files',
]

EXTRA_PATH_METADATA = {
    'files/googleb165fe55002fa457.html': {'path': 'googleb165fe55002fa457.html'},
}

THEME = 'theme'
DEFAULT_PAGINATION = 10

FILENAME_METADATA = r'(?P<date>\d{4}-\d{2}-\d{2})_(?P<slug>.*)'

DISPLAY_CATEGORIES_ON_MENU = False