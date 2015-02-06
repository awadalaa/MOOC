"""
Coursera - Introduction to Data Science Assignment1
Write a Python script frequency.py to compute the term frequency histogram of the livestream data 
you harvested from Problem 1. The frequency of a term can be calculated as [# of occurrences of the 
term in all tweets]/[# of occurrences of all terms in all tweets]
"""
import sys
import json
import re

def load_tweets(fp):
    """
    Creates in-memory JSON objects from file ``fp``.
    """
    lst = []
    line = fp.readline()
    while len(line) is not 0:
        data = json.loads(line.strip())
        lst.append(data)
        line = fp.readline()
    return lst

def parse_tweets(tweets):
    """
    Parses a list of tweets, splitting the value of the ``text`` property
    into tokens based on a regular expression.
    """
    pattern = re.compile(r'\w+')
    parsed = []
    for t in tweets:
        if 'text' not in t.keys():
            continue
        # Obtain a list of words
        words = pattern.findall(t['text'])
        parsed.append(words)
    return parsed

def hw(tweet_file):
    tweets = load_tweets(tweet_file) # get list of tweets dicts
    parsed = parse_tweets(tweets) # parse tweets to get text
    lookup = {}
    total_terms = 0
    for tweet in parsed:
        for term in tweet:
            term = term.lower()
            lookup[term] = lookup.get(term,0) + 1
            if lookup[term]==1:
                total_terms += 1.00
    for word in lookup:
        lookup[word] = lookup[word] / total_terms
        print word, lookup[word]


def main():
    # to run: python frequency.py <tweet_file>
    tweet_file = open(sys.argv[1])
    hw(tweet_file)
    tweet_file.close()

if __name__ == '__main__':
    main()