#!/usr/bin/python3
import logging, sys
import os, pandas as pd, json
from lineage import Lineage

dirname = os.path.dirname(__file__)
logger = logging.getLogger()
logger.setLevel(logging.INFO)
logger.addHandler(logging.StreamHandler(sys.stdout))

l = Lineage(output_dir= os.path.join(dirname, '../storage/app/public/dna/output'))

var1 = sys.argv[1]
var2 = sys.argv[2]

file1 = os.path.join(dirname, '../storage/app/dna/') + sys.argv[3]
file2 = os.path.join(dirname, '../storage/app/dna/') + sys.argv[4]

user662 = l.create_individual(var1, file1)
user663 = l.create_individual(var2, file2)
discordant_snps = l.find_discordant_snps(user662, user663, save_output=True)
len(discordant_snps.loc[discordant_snps['chrom'] != 'MT'])
results = l.find_shared_dna([user662, user663], cM_threshold=0.75, snp_threshold=1100, genetic_map='HapMap2')
# logger.warning(results)

df = results['one_chrom_shared_dna']
total_cms = 0
largest_cm = 0
for x in df.index:
    total_cms += df.loc[x, 'cMs']
    if df.loc[x, 'cMs'] > largest_cm:
        largest_cm = df.loc[x, 'cMs']

print(json.dumps({'total_cms': total_cms, 'largest_cm': largest_cm}))
