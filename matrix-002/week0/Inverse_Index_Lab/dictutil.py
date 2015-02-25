
def dict2list(dct, keylist): return [dct[k] for k in keylist]

def list2dict(L, keylist): return {k: v for (k, v) in zip(keylist, L)}

def listrange2dict(L): return {i:L[i] for i in range(len(L))}