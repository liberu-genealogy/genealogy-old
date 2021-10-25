#!/usr/local/bin/python3.8
import sys
import logging, sys
logger = logging.getLogger()
logger.setLevel(logging.INFO)
logger.addHandler(logging.StreamHandler(sys.stdout))
from lineage import Lineage
l = Lineage(output_dir='storage/app/dna/output')

var1 = sys.argv[1]
var2 = sys.argv[2]

file1 = "storage/app/dna/" + sys.argv[3]
file2 = "storage/app/dna/" + sys.argv[4]

user662 = l.create_individual(var1, file1)
user663 = l.create_individual(var2, file2)
discordant_snps = l.find_discordant_snps(user662, user663, save_output=True)
len(discordant_snps.loc[discordant_snps['chrom'] != 'MT'])
results = l.find_shared_dna([user662, user663], cM_threshold=0.75, snp_threshold=1100)
