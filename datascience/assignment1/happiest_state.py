import sys
import json

def getsentimentdict(f):
	with open(f) as affinfile:
		scores={}
		for line in affinfile:
			term, score = line.split("\t")
			scores[term] = int(score)
	return scores

def gettwitterdata(f):
	lst = []
	with open(f) as twitterfile:
		for line in twitterfile:
			lst.append(json.loads(line.strip()))
	return lst

def computeSentiment(words,sentimentDict):
	score = 0.0
	for word in words:
		if word in sentimentDict:
			score += sentimentDict.get(word,0)
	return score

def main():
	sent_file = sys.argv[1]
	tweet_file = sys.argv[2]  
	sentimentDict = getsentimentdict(sent_file)
	tweets = gettwitterdata(tweet_file)
	state_happiness = {}
	state_count = {}
	for t in tweets:
		if 'text' not in t.keys():
			continue
		try:
			words = t["text"].split()
			if t["place"]["country_code"] == "US" and t["place"]["place_type"] == "city":
				curstate = t["place"]["full_name"].split().pop()
				cursentiment = computeSentiment(words,sentimentDict)
				state_happiness[curstate] = state_happiness.get(curstate,0) + cursentiment
				state_count[curstate] = state_count.get(curstate,0) + 1
		except(KeyError, TypeError):
				pass
	happiest_state = ""
	for state in state_happiness:
		state_happiness[state] = state_happiness[state]/state_count[state]
		if state_happiness[state] >= state_happiness.get(happiest_state,0):
			happiest_state = state
	print happiest_state

if __name__ == '__main__':   
	main()